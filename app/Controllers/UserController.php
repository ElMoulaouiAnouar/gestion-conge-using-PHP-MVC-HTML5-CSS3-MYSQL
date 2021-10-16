<?php
class UserController extends Controller{


    private $user_model = null;
    public function __construct()
    {
        $this->user_model = $this->model('User');
    }

    public function login(){
        $this->view('Auth.index');
    }
    public function logout(){
        $this->view('Auth.logout');
    }

    public function CheckLogin($data){
        $user = $this->user_model->checkLogin($data);
        if($user){
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_id'] = $user->id_employe;
            $_SESSION['user_name'] = $user->nom.' '.$user->prenom;
            $_SESSION['type_user'] = $user->id_type_user == 1 ? 'admin' : 'user';
            redirect::to('home/index');
        }
        else{
            session::set("faild",'login or password inccorrect');
            redirect::to('Auth/index');
        }
    }

    public function getUser($id){
        $user =  $this->user_model->getUser($id);
        if($user)
            return $user;
    }
    


}