<?php
class EmployeController extends Controller{

    private $employe_model = null;

    public function __construct()
    {
        $this->employe_model = $this->model('Employe');
    }

    public function create(){
        $this->view('employes.create');
    }
    
    public function edit($id){
        $this->view('employes.edit',['id'=>$id]);
    }
    
}