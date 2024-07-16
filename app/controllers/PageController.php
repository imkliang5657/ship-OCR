<?php

class PageController extends Controller
{
    public function dashboard(): void
    {
        $this->view('dashboard');
    }

    public function vesselDatabaseDashboard(): void
    {
        $this->view('vessel-database-dashboard');
    }

    public function domesticVessel(): void
    {
        $this->view('domestic-vessel');
    }

    public function domesticVesselInformation(): void
    {
        $getData = $this->retrieveGetData();
        $name = match ($getData['vesselId']) {
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
        $this->view('domestic-vessel-information', ['name' => $name]);
    }

    public function vesselApplicationDashboard(): void
    {
        $this->view('vessel-application-dashboard');
    }

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
