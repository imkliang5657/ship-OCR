<?php

class PageController extends Controller
{
    public function dashboard(): void
    {
        $this->view('dashboard');
    }

    public function shipDatabaseDashboard(): void
    {
        $this->view('ship-database-dashboard');
    }

    public function domesticShip(): void
    {
        $this->view('domestic-ship');
    }

    public function domesticShipInformation(): void
    {
        $getData = $this->retrieveGetData();
        $name = match ($getData['ship_id']) {
            1 => '翡翠輪',
            2 => '東方海威',
            3 => '台船11號',
            4 => '台船16號',
            5 => '台船15號',
            6 => '東方巴法洛',
            7 => '東方建設者',
            8 => '大地能源號',
            9 => '大三商領航者',
            default => ''
        };
        $this->view('domestic-ship-information', ['name' => $name]);
    }

    public function shipApplicationDashboard(): void
    {
        $this->view('ship-application-dashboard');
    }

   
    
   /* public function insertApplication() : void{
        $postData = $this->retrievePostData();
        if (empty($postData['id'])) {
            $this->windFarmInformation->create($postData);
        } else {
            var_dump('update');
            $information = $this->windFarm->getById($postData['id']);
            if (isset($information)) {
                $this->windFarmInformation->update($postData);
            }
            
        }

    }*/

    public function announcement(): void
    {
        $this->view('announcement');
    }

    public function login(): void
    {
        $getData = $this->retrieveGetData();
        $error = isset($getData['error']) && $getData['error'] == 1;
        $this->view('login', ['error' => $error]);
    }
}
