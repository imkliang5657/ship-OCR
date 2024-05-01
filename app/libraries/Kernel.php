<?php
//require_once('../controllers/Page.php');
class Kernel
{
    //$_GET['url']="page/index";
    protected $currentController = 'Page';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
      // printf($_GET['LOA']);
      
        $url = $this->getUrl();
        // post/show/1
       // && $this->isControllerExists($url[0])
        if (isset($url[0]) ) {
            require_once ('../app/controllers/' . $url[0] . '.php');
            $this->currentController = new $url[0]();
            if (isset($url[1]) && $this->controllerHasMethod($url[0], $url[1])) {
                $this->currentMethod = $url[1];
            }
            if (isset($url[2])) {
                $this->params = $this->fetchDataFromUrl($url);
            }
            if(isset($_POST)){
                $this->params[]=$_POST;
            }
        }
    
        
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     * @return array
     */
    private function getUrl() {
        if (array_key_exists('url', $_GET) && !empty($_GET['url'])) {
            return explode("/", $_GET['url']);
        } else {
            return [];
        }
    }

    /**
     * @param $controller
     * @return bool
     */
    private function isControllerExists($controller) {
        return file_exists('../app/controllers/' . $controller . '.php');
    }

    /**
     * @param $controller
     * @param $method
     * @return bool
     */
    private function controllerHasMethod($controller, $method) {
        return method_exists($controller, $method);
    }

    /**
     * @param $url
     * @return array
     */
    private function fetchDataFromUrl($url) {
        return array_slice($url , 2 , count($url));
    }

}