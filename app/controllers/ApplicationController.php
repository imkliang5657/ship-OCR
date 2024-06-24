<?php

class ApplicationController extends Controller
{
    private $application_doc;
    private $application_table_name;
    public function __construct()
    {
        $_SESSION['id']=2;
        $this->application_doc = $this->model('Application');
    }
    public function createApplication(): void //風場資料頁面
    {
        $this->view('create-application', ['windFarms' => $this->model('WindFarm')->getAll(), 'vessel_categories' => $this->model('VesselCategory')->getAll()]);
    }


    public function requirementSpec(): void //需求規格頁面
    {
        $getData = $this->retrieveGetData();
        $spec=array(
            '1'=>array('最大吊重(T)','最大吊高(M)','最大吊重半徑(M)','作業水深(M)','其它設備'),
            '2'=>array('支撐腳長(M)','最大吊重(T)','最大吊高(M)','最大吊重半徑(M)','作業水深','其它設備'),
            '3'=>array('盤纜槽裝載量(T)','作業水深(M)','其它設備'),
            '4'=>array('工作速度(T/Hr)','作業水深(M)','其它設備'),
            '5'=>array('工作速度(T/Hr)','作業水深(M)','其它設備'),
            '6'=>array('繫纜拖力(T)','其它設備'),
            '7'=>array('繫纜拖力(T)','其它設備'),
            '8'=>array('其它設備'),
            '9'=>array('動態補償舷梯','床位數','其它設備'),
            '10'=>NULL,
            '11'=>NULL,
            '12'=>NULL,
            '13'=>NULL,
            '14'=>array('床位數','其它設備'),
            '15'=>array('床位數','其它設備'),
        );
        if ($spec[$getData['id']] == NULL) {
            $this->view('application-ship');
        } else {
            $this->view('application-requirement-spec', $spec[$getData['id']]);
    }
}
    public function postRequirement(): void //處理需求規格資料
    {
        $data = $this->retrievePostData();
        $array = array_fill(1, 7, null);  //建一個空陣列，用於方便新增需求規格資料
        foreach($data as $index => $value){
            if($value != NULL){
                $array[$index] = $value;
            }
        }
        $this->application_doc->createRequireSpec($array,$_SESSION['application_id']);
        $this->redirect('./?url=page/application-ship');
    }
    public function postApplicationship(): void //處理國外船舶資料
    {
        $data = $this->retrievePostData();
        $data['application_id']=$_SESSION['application_id'];
        $this->application_doc->createApplicationShip($data);
        $this->redirect('./?url=page/application-manage');
        // var_dump($data);
        // die();
    }
    public function applicationShip(): void //國外船舶選擇頁面
    {
        $ship=$this->application_doc->retrieveUsableShip();
        $this->view('application-ship',['ship'=>$ship]);
    }
    public function createApplicationCase() //處理風場資料
    {
        $postData =$this->retrievePostData() ;
        // var_dump($postData);
        // die();
        $_SESSION['application_id']=$this->application_doc->createApplication($this->retrievePostData(),$_SESSION['id']);
        // var_dump($application_id);
        $this->redirect('./?url=page/application-requirement-spec&id='. $postData['vessel_category_id']);
    }
    public function ApplicationManage(): void //申請案管理頁面
    {
        
        $applications=$this->application_doc->retrieveApplication($_SESSION['id']);
        // var_dump($applications);
        // die();
        $data = false;
        $this->view('application-manage', $applications);
    }
    public function ApplicationStage(): void //填表階段頁面
    {
        $getData= $this->retrieveGetData();
        $array = array_fill(1, 3,false);
        $information=$this->application_doc->retrieveInformationById($getData['id']);
        if( $information !=NULL){
            $array[1]=true;
            $array['vessel_category_id']=$information['vessel_category_id'];
        }
        if($this->application_doc->retrieveRequirementById($getData['id']) !=NULL){
            $array[2]=true;
        }
        if($this->application_doc->retrieveShipById($getData['id']) !=NULL){
            $array[3]=true;
        }
        $this->view('application-stage',$array);
    }
}
