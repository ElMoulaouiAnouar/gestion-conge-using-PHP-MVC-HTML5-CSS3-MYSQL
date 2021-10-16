<?php
class EmployeController extends Controller{

    private $employe_model = null;

    public function __construct()
    {
        $this->employe_model = $this->model('Employe');
    }

    public function create(){
        if(isset($_SESSION['user_id'])){
            $this->view('employes.create');
        }
        else{
            redirect::to('user/index');
        }
    }
    
    public function edit($id){
        if(isset($_SESSION['user_id'])){
            $this->view('employes.edit',['id'=>$id]);
        }
        else{
            redirect::to('user/index');
        }
    }

    
    
}