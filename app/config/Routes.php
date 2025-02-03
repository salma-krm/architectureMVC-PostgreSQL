<?php
namespace app\config;
class Routes {
    private $controller = '\\app\\controllers\\PageController';
    private $method = 'index';
    private $param = [];

    public function __construct() {
        $url = $this->getUrl();
        if (isset($url[0])) {
            $controllerClass = ucwords($url[0]);
            
            
            if (class_exists('\\app\\controllers\\' . $controllerClass . 'Controller')) {
                $this->controller = $controllerClass;
                unset($url[0]);
            }
    
            
            $controllerClass = '\\app\\controllers\\' . $this->controller . 'Controller';
            $this->controller = new $controllerClass;
            
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

           
            if (!empty($url)) {
                $this->param = array_values($url);
            } else {
                $this->param = [];
            }
            
        }else{
            $this->controller = new $this->controller;
        }

         
    
        call_user_func_array([$this->controller, $this->method], $this->param); 
    }

    public function getUrl() {
        
        $uri = !empty($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        $uri = explode('/', trim($uri, '/'));
        $uri = array_slice($uri,1);
        return $uri;
    }
}
?>
