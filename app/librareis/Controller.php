<?php
class Controller{

    public function __construct()
    {
        
    }

    public function view($view,$data = []){
        $view =  str_replace('.','/',$view);
        if(file_exists('../app/Views/'.$view.'.php')){
            require '../app/Views/'.$view.'.php';
        }
        else{
            die('Views Not Exists');
        }
    }

    public function model($model){
        $model_fileName = '../app/Models/'.$model.'.php';
        if(file_exists($model_fileName)){
            require_once $model_fileName;
            return new $model();
        }
    }

}