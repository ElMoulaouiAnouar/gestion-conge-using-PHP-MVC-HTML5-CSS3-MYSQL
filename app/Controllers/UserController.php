<?php
class UserController extends Controller{

    public function __construct()
    {

    }

    public function login(){
        $this->view('Auth/index');
    }


}