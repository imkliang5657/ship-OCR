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
            'page/ship-database-dashboard' => ['PageController', 'shipDatabaseDashboard'],
            'page/domestic-ship' => ['PageController', 'domesticShip'],
            'page/domestic-ship-information' => ['PageController', 'domesticShipInformation'],
            'page/ship-application-dashboard' => ['PageController', 'shipApplicationDashboard'],
            'page/create-application' => ['ApplicationController', 'createApplication'],
            'page/create-application-case' =>  ['ApplicationController', 'createApplicationCase'],
            'page/application-requirement-spec' => ['ApplicationController', 'requirementSpec'],
            'page/application-ship' => ['ApplicationController', 'applicationShip'],
            'page/wind-farm-newform' => ['WindFarmController', 'windFarmNewForm'], 
            'page/wind-farm' => ['WindFarmController', 'windFarm'],
            'page/wind-farm-information' =>['WindFarmController','windFarmInformation'],
            'upsert-wind-farm-information' =>['WindFarmController','upsertInformation'],
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

