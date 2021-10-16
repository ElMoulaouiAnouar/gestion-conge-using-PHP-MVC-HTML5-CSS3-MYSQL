<?php 
class HomeController extends Controller{

    public function __construct()
    {
        
    }
    
    public function index(){
        if(isset($_SESSION['user_id'])){
            $this->view('employes.index');
        }
        else{
            redirect::to('user/index');
        }
    }

}