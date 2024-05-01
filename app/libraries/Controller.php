<?php

class Controller
{
    /**
     * @param $model
     * @return mixed|void
     */
    public function model($model) {
        if ($this->isModelExists($model)) {
            require_once ('../app/models/' . $model . '.php');
            return new $model();
        } else {
            die('Model does not exist');
        }
    }

    /**
     * @param $view
     * @param $data
     * @return void
     */
    public function view($view, $data = []) {
        if ($this->isViewExists($view)) {
            require_once ('../app/views/' . $view . '.php');
        } else {
            die('View does not exist');
        }
    }

    /**
     * @param $view
     * @return bool
     */
    private function isViewExists($view) {
        return file_exists('../app/views/' . $view . '.php');
    }

    /**
     * @param $model
     * @return bool
     */
    private function isModelExists($model) {
        return file_exists('../app/models/' . $model . '.php');
    }

    /**
     * @param $url
     * @return void
     */
    protected function redirect($url) {
        header('Location: ' . $url);
        exit();
    }

}