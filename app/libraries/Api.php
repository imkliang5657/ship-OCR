<?php

class Api
{
    private array $routes = [
        'noRestriction' => [
            'page/login' => ['PageController', 'login'],
            'login' => ['AuthController', 'login'],
        ],
        'hasLogin' => [
            'page/dashboard' => ['PageController', 'dashboard'],
            'page/vessel-database-dashboard' => ['PageController', 'vesselDatabaseDashboard'],
            'page/domestic-vessel' => ['PageController', 'domesticVessel'],
            'page/domestic-vessel-information' => ['PageController', 'domesticVesselInformation'],
            'page/vessel-application-dashboard' => ['PageController', 'vesselApplicationDashboard'],

            'page/application-manage' => ['ApplicationController', 'showApplicationManage'],
            'page/application-case' => ['ApplicationController', 'showApplication'],
            'upsert-application-case' => ['ApplicationController', 'upsertApplicationCase'],
            'page/application-requirement' => ['ApplicationController', 'showApplicationRequirement'],
            'upsert-requirement' => ['ApplicationController', 'upsertRequirement'],
            'page/application-foreign-vessel' => ['ApplicationController', 'showApplicationForeignVessel'],
            'upsert-application-foreign-vessel' => ['ApplicationController', 'upsertApplicationVessel'],
            'page/application-content' => ['ApplicationController', 'showApplicationContent'],
            'upsert-application-content' => ['ApplicationController', 'upsertApplicationContent'],
            'application-stage' => ['ApplicationController', 'applicationStage'],
            
            'page/wind-farm-new-form' => ['WindFarmController', 'windFarmNewForm'],
            'page/wind-farm' => ['WindFarmController', 'windFarm'],
            'page/wind-farm-information' => ['WindFarmController', 'windFarmInformation'],
            'upsert-wind-farm-information' => ['WindFarmController', 'upsertInformation'],
            'page/get/bulletins' => ['BulletinController', 'search'],
            'page/announcement' => ['PageController', 'announcement'],
            'logout' => ['AuthController', 'logout'],
        ],
        'onlyAdminCanUse' => []
    ];

    /**
     * @throws HttpStatusException
     */
    public function findRoute($targetRoute): array
    {
        foreach ($this->routes as $restriction => $route) {
            if (array_key_exists($targetRoute, $route)) {
                return [
                    'restriction' => $restriction,
                    'handler' => $route[$targetRoute]
                ];
            }
        }
        throw new HttpStatusException(404, '找不到您想要瀏覽的網頁或執行的動作!');
    }
}

