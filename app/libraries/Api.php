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

            'page/application-manage' => ['ApplicationController', 'applicationManage'],
            'page/application-stage' => ['ApplicationController', 'applicationStage'],
            'page/create-application' => ['ApplicationController', 'createApplication'],
            'create-application-case' => ['ApplicationController', 'create'],
            'page/application-requirement-spec' => ['ApplicationController', 'requirementSpec'],
            'create-requirement' => ['ApplicationController', 'createRequirement'],
            'page/application-vessel' => ['ApplicationController', 'applicationVessel'],
            'create-application-vessel' => ['ApplicationController', 'createApplicationVessel'],

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

