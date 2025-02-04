<?php

namespace app\config;

class Routes
{
    private $controller = 'Page';
    private $method = 'index';
    private $param = [];
    public function __construct()
    {
        $url = $this->getUrl();

        if (isset($url[0])) {
            $controllerClass = ucwords($url[0]);


            if (class_exists('\\app\\controllers\\' . $controllerClass . 'Controller')) {
                $this->controller = $controllerClass;
                // unset($url[0]);
            }


            $controllerClass = '\\app\\controllers\\' . $this->controller . 'Controller';
            $this->controller = new $controllerClass;

            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                }
            }


            if (!empty($_REQUEST)) {
                $this->convertArray($_REQUEST);
            } else {
                $this->param = [];
            }
        } else {
            $this->controller = new $this->controller;
        }

        call_user_func_array([$this->controller, $this->method], $this->param);
    }

    private function getUrl()
    {

        $uri = $_SERVER['PATH_INFO'] ?? '/';

        $request = $_REQUEST;
        // var_dump($uri);
        // var_dump($request);
        // die;

        $uri = explode('/', trim($uri, '/'));


        return $uri;
    }
    private function convertArray($array)
    {

        foreach ($array as $value) {
            array_push($this->param, $value);
        }
    }
    private function getBasePaths()
    {
        $path = $_SERVER['HTTP_REFERER'];
        header("Location: $path ");
    }
}
