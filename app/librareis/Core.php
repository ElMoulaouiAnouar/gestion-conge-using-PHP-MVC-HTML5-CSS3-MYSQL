<?php
class Core{

    protected $currentController = 'Home';
    protected $currentMehod = 'index';
    protected $params = [];


    public function __construct()
    {
        $urlExploded = $this->getUrl();
        //controller
        if(isset($urlExploded[0])){
            $controllerName = ucwords($urlExploded[0]).'Controller';
            if(file_exists('../app/Controllers/'.$controllerName.'.php')){
                $this->currentController = $controllerName;
                unset($urlExploded[0]);
            }
        }
        require_once '../app/Controllers/'.$this->currentController.'.php';
        $this->currentController = new $this->currentController;
        //method
        if(isset($urlExploded[1])){
            if(method_exists($this->currentController,$urlExploded[1])){
                $this->currentMehod = $urlExploded[1];
                unset($urlExploded[1]);
            }
        }
        //params

        $this->params = $urlExploded ? array_values($urlExploded) : [] ;

        //callback function from controller with parameters

        call_user_func_array([$this->currentController,$this->currentMehod],$this->params);

    }

    private function GetUrl(){
        if(isset($_GET['url'])){
            $url = filter_var($_GET['url'],FILTER_SANITIZE_URL);
            $url = trim($url,'/');
            return explode('/',$url);
        }
    }

}