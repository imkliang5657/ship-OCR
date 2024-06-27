<?php

class ApplicationController extends Controller
{
    private Application $application;
    private ApplicationInformation $applicationInformation;
    private ApplicationForeignVessel $applicationForeignVessel;
    private ApplicationVesselRequirement $applicationVesselRequirement;
    private Vessel $vessel;
    private VesselDetail $vesselDetail;

    public function __construct()
    {
        $this->application = $this->model('Application');
        $this->applicationInformation = $this->model('ApplicationInformation');
        $this->applicationForeignVessel = $this->model('ApplicationForeignVessel');
        $this->applicationVesselRequirement = $this->model('ApplicationVesselRequirement');
        $this->vessel = $this->model('Vessel');
        $this->vesselDetail = $this->model('VesselDetail');
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

    public function create(): void
    {
        $postData = $this->retrievePostData();
        $applicationId = $this->application->create($postData);
        $this->redirect('./?url=page/application-requirement-spec&id=' . $applicationId);
    }

    // 風場資料頁面
    public function createApplication(): void
    {
        $this->view('create-application', ['windFarms' => $this->model('WindFarm')->getAll(), 'vessel_categories' => $this->model('VesselCategory')->getAll()]);
    }

    // 需求規格頁面
    public function requirementSpec(): void
    {
        $getData = $this->retrieveGetData();
        $vesselCategoryId = $this->applicationInformation->getByApplicationId($getData['id'])['vessel_category_id'];
        $columns = Utils::convertEnglishToChineseForSpecificationColumns($vesselCategoryId);
        if (is_null($columns)) {
            $this->view('application-vessel');
        } else {
            $this->view('application-requirement-spec', ['application_id' => $getData['id'], 'columns' => $columns]);
        }
    }

    // 處理需求規格資料
    public function createRequirement(): void
    {
        $postData = $this->retrievePostData();
        $this->vesselDetail->create($postData);
        $postData['vessel_detail_id'] = $this->vesselDetail->lastInsertId();
        $this->applicationVesselRequirement->create($postData);
        $this->redirect('./?url=page/application-vessel&id=' . $postData['application_id']);
    }

    // 處理國外船舶資料
    public function createApplicationVessel(): void
    {
        $postData = $this->retrievePostData();
        $this->applicationForeignVessel->create($postData);
        $this->redirect('./?url=page/application-manage');
    }

    // 國外船舶選擇頁面
    public function applicationVessel(): void
    {
        $getData = $this->retrieveGetData();
        $vesselCategoryId = $this->applicationInformation->getByApplicationId($getData['id'])['vessel_category_id'];
        $vessels = $this->vessel->getByVesselCategoryId($vesselCategoryId);
        $this->view('application-vessel', ['application_id' => $getData['id'], 'vessels' => $vessels]);
    }

    // 申請案管理頁面
    public function applicationManage(): void
    {
        $applications = $this->application->getAll();
        $applications = array_map(function($item) {
            $item['status'] = $this->convertStatusFromEnglishToChinese($item['status']);
            return $item;
        }, $applications);
        $this->view('application-manage', ['applications' => $applications]);
    }

    // 填表階段頁面
    public function applicationStage(): void
    {
        $getData = $this->retrieveGetData();
        $array = array_fill(1, 3, false);
        $information = $this->application->retrieveInformationById($getData['id']);
        if (isset($information)) {
            $array[1] = true;
            $array['vessel_category_id'] = $information['vessel_category_id'];
        }
        if ($this->applicationVesselRequirement->getById($getData['id']) !== null) {
            $array[2] = true;
        }
        if ($this->applicationForeignVessel->getById($getData['id']) !== null) {
            $array[3] = true;
        }
        $this->view('application-stage', $array);
    }
}
