<?php

use PhpParser\Node\Expr\Empty_;

class ResetPasswordController extends Controller{

    private $reset_mode = null;

    public function __construct()
    {
        $this->reset_mode = $this->model('ResetPassword');
    }

    public function index(){
        $this->view('Auth.reset');
    }

    public function sendToEmail(){
            if(isset($_POST['btn_send']) && !empty($_POST['email'])){
                if(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL)){
                    $email = $_POST['email'];
                    $token = md5(uniqid('reset_',true).random_int(1,10));
                    //chenage time zone
                    date_default_timezone_set('America/New_York');
                    //add 15 minutes to currect time
                    $date_expr = strtotime("+15 minutes", strtotime(date('Y-m-d H:i:s')));
                    $date_exp =  date('Y-m-d H:i:s', $date_expr);
            
                    if($this->reset_mode->insert($token,$date_exp,$email)){
                        $url = 'http://localhost/php_tutorial/gestion_conge_php/ResetPassword/reset/'.$token.'/'.$email;
                        $mail = new mail();
                        $mail->SendEmail($email,$url);
                    }
                    else{
                        session::Set('faild','can not send link verfier email address');
                    }
                }   
            }

       
    }

    public function reset($token = '',$email = ''){
        if(!empty($token) && !empty($email)){
            $verfier =  $this->reset_mode->checkToken($token,$email);
            if($verfier==false){
                $this->view('Auth.passwordChange');
            }
            else{
                die($verfier);
            }
        }
    }

}