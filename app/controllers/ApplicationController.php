<?php

class ApplicationController extends Controller
{
    private Application $application;
    private ApplicationInformation $applicationInformation;
    private ApplicationForeignVessel $applicationForeignVessel;
    private ApplicationVesselRequirement $applicationVesselRequirement;
    private Vessel $vessel;
    private VesselCategory $vesselCategory;
    private VesselDetail $vesselDetail;
    private WindFarm $windFarm;


    public function __construct()
    {
        $_SESSION['applicant_id']=1;
        $this->application = $this->model('Application');
        $this->applicationInformation = $this->model('ApplicationInformation');
        $this->applicationForeignVessel = $this->model('ApplicationForeignVessel');
        $this->applicationVesselRequirement = $this->model('ApplicationVesselRequirement');
        $this->vessel = $this->model('Vessel');
        $this->vesselCategory = $this->model('VesselCategory');
        $this->vesselDetail = $this->model('VesselDetail');
        $this->windFarm = $this->model('WindFarm');
    }

    private function convertStatusFromEnglishToChinese(string $status): string
    {
        $rule = [
            'edited' => '編輯中',
            'submitted' => '尚未審查',
            'prepare_conference' => '會議準備',
            'rejected' => '被退件',
            'in_conference' => '審查會議',
            'conference_ended' => '會議結束',
            'closed' => '通過',
        ];
        return $rule[$status];
    }

    private function getButtons(?int $applicationId, int $page): array
    {
        $submitted = isset($applicationId) && $this->application->getById($applicationId)['status'] !== 'edited';
        $styles = array_fill(0, 4, 'secondary');
        $styles[$page] = 'primary';
        return [
            'style' => $submitted ? array_fill(0, 4, 'danger') : $styles,
            'disabled' => array_map(fn($disabled) => $disabled ? 'disabled' : '',
                $submitted ? array_fill(0, 4, true) : [
                    false,
                    is_null($applicationId) || $this->applicationInformation->getByApplicationId($applicationId) === false,
                    is_null($applicationId) || $this->applicationVesselRequirement->getByApplicationId($applicationId) === false,
                    is_null($applicationId) || $this->applicationForeignVessel->getByApplicationId($applicationId) === false,
                ]
            ),
        ];
    }

    // 申請案管理頁面
    public function showApplicationManage(): void
    {
        $applications = $this->application->getAllByApplicantId($_SESSION['applicant_id']);
        $applications = array_map(function ($item) {
            $item['statusText'] = $this->convertStatusFromEnglishToChinese($item['status']);
            return $item;
        }, $applications);
        $applications = array_map(function ($item) {
            $item['vessel_id']= $this->applicationForeignVessel->getByApplicationId($item['id'])['foreign_vessel_id']??null;
            $item['vesselname'] =$item['vessel_id'] ? $this->vessel->getById($item['vessel_id'])['name']:'無';
            return $item;
        }, $applications);
        $this->view('application-manage', ['applications' => $applications,]);
    }

    // 風場資料頁面
    public function showApplication(): void
    {
        $getData = $this->retrieveGetData();
        $this->view('application-case', [
            'buttons' => $this->getButtons($getData['id'] ?? null, 0),
            'windFarms' => $this->windFarm->getAll(),
            'vesselCategories' => $this->vesselCategory->getAll(),
            'applicationId' => $getData['id'] ?? null,
            'applicationInformation' => isset($getData['id']) ? $this->applicationInformation->getByApplicationId($getData['id']) : null,
        ]);
    }

    public function upsertApplicationCase(): void
    {
        $postData = $this->retrievePostData();
        if ($applicationId = $postData['application_id']) {
            $this->application->update($postData);
        } else {
            $applicationId = $this->application->create($postData,$_SESSION['applicant_id']);
        }
        $this->redirect('./?url=page/application-requirement&id=' . $applicationId);
    }

    // 需求規格頁面
    public function showApplicationRequirement(): void
    {
        $getData = $this->retrieveGetData();
        $vesselCategoryId = $this->applicationInformation->getByApplicationId($getData['id'])['vessel_category_id'];
        $columns = Utils::convertEnglishToChineseForSpecificationColumns($vesselCategoryId);
        if (is_null($columns)) {
            $this->showApplicationForeignVessel();
        } else {
            $vesselDetailId = $this->applicationVesselRequirement->getByApplicationId($getData['id'])['vessel_detail_id'] ?? null;
            $this->view('application-requirement', [
                'buttons' => $this->getButtons($getData['id'], 1),
                'applicationId' => $getData['id'],
                'columns' => $columns,
                'vesselDetail' => $vesselDetailId ? $this->vesselDetail->getById($vesselDetailId) : null,
            ]);
        }
    }

    // 處理需求規格資料
    public function upsertRequirement(): void
    {
        $postData = $this->retrievePostData();
        if ($this->applicationVesselRequirement->getByApplicationId($postData['application_id'])) {
            $this->vesselDetail->update($postData);
        } else {
            $postData['vessel_detail_id'] = $this->vesselDetail->create($postData);
            $this->applicationVesselRequirement->create($postData);
        }
        $this->redirect('./?url=page/application-foreign-vessel&id=' . $postData['application_id']);
    }

    // 國外船舶選擇頁面
    public function showApplicationForeignVessel(): void
    {
        $getData = $this->retrieveGetData();
        $vesselCategoryId = $this->applicationInformation->getByApplicationId($getData['id'])['vessel_category_id'];
        $vessels = $this->vessel->getByVesselCategoryId($vesselCategoryId);
        $vessel = $this->applicationForeignVessel->getByApplicationId($getData['id']);
        $this->view('application-foreign-vessel', [
            'buttons' => $this->getButtons($getData['id'], 2),
            'applicationId' => $getData['id'],
            'vessels' => $vessels,
            'vessel' => $vessel,
        ]);
    }

    // 處理國外船舶資料
    public function upsertApplicationVessel(): void
    {
        $postData = $this->retrievePostData();
        if ($this->applicationForeignVessel->getByApplicationId($postData['application_id'])) {
            $this->applicationForeignVessel->update($postData);
        } else {
            $this->applicationForeignVessel->create($postData);
        }
        $this->redirect('./?url=page/application-content&id=' . $postData['application_id']);
    }

    // 顯示先前填過的所有資訊
    public function showApplicationContent(): void
    {
        $getData = $this->retrieveGetData();
        $data = $this->application->getFullDataById($getData['id']);
        $columns = Utils::convertEnglishToChineseForSpecificationColumns($data['vessel_category_id']);
        $this->view('application-content', [
            'buttons' => $this->getButtons($getData['id'], 3),
            'applicationId' => $getData['id'],
            'application' => $data,
            'columns' => $columns,
            'edited' => $this->application->getById($getData['id'])['status'] == 'edited',
        ]);
    }

    public function submitApplicationContent(): void
    {
        $getData = $this->retrieveGetData();
        $this->application->updateStatus($getData['id'], 'submitted');
        $this->redirect('./?url=page/application-content&id=' . $getData['id']);
    }

    // 填表階段頁面
    public function applicationStage(): void
    {
        $getData = $this->retrieveGetData();
        if ($this->applicationForeignVessel->getByApplicationId($getData['id'])) {
            $this->showApplicationContent();
        } elseif ($this->applicationVesselRequirement->getByApplicationId($getData['id'])) {
            $this->showApplicationForeignVessel();
        } elseif ($this->applicationInformation->getByApplicationId($getData['id'])) {
            $this->showApplicationRequirement();
        } else {
            $this->showApplication();
        }
    }
}
