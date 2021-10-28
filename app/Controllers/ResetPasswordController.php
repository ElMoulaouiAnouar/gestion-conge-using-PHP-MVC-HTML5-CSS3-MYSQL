<?php

class ResetPasswordController extends Controller{

    private $reset_model = null;
    private $employe_model = null;

    public function __construct()
    {
        $this->reset_model = $this->model('ResetPassword');
        $this->employe_model = $this->model('Employe');
    }

    public function index(){
        $this->view('Auth.reset');
    }



    public function sendToEmail(){
            if(isset($_POST['btn_send']) && !empty($_POST['email'])){
                if(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL)){
                    $email = $_POST['email'];
                    //verfier email enter if exists to table employe
                    if($this->checkEmail($email)){
                        $token = md5(uniqid('reset_',true).random_int(1,10));
                        //chenage time zone
                        date_default_timezone_set('America/New_York');
                        //add 15 minutes to currect time
                        $date_expr = strtotime("+15 minutes", strtotime(date('Y-m-d H:i:s')));
                        $date_exp =  date('Y-m-d H:i:s', $date_expr);
                
                        if($this->reset_model->insert($token,$date_exp,$email)){
                            $url = BASE_URL.'ResetPassword/reset/'.$token.'/'.$email;
                            $mail = new mail();
                            $mail->SendEmail($email,$url);
                        }
                        else{
                            session::Set('faild','can not send link');
                        }
                    }
                    else{
                        session::Set('faild','email inccorrect');
                    }
                    redirect::To('ResetPassword/index');
                }   
            }

       
    }

    public function reset($token,$email){
        if(!empty($token) && !empty($email)){
            $value =  $this->reset_model->getTokenAndDateExp($email);
            if($value){
                if($value->token == $token){
                    //verfier date_expert
                    date_default_timezone_set('America/New_York');
                    $value =  explode(' ',$value->date_exp);
                    if($value[0] === date('Y-m-d')){
                        if($value[1] >= date('H:i:s'))
                            $this->view('Auth.passwordChange',['email' => $email,'token' =>$token]);
                        else
                            echo 'time token expert';
                    }
                    else{
                        echo 'date token expert';
                    }
                }
                else{
                    echo 'token inccorrect';
                }
            }
            else{
                echo 'email inccorrect';
            }
        }
    }

    //function check Email if exists
    public function checkEmail($email){
       return $this->employe_model->CheckEmailExist($email);
    } 

    //function change password
    public function ChangePassword($request,$email,$token){
        //if click to button save
        if(isset($_POST['btn_save'])){
            $data = [
                'password' => Filters::FilterInput($_POST['password']),
                'confirmed_password' => Filters::FilterInput($_POST['confirmed_password'])
            ];

            $request->validate($data,[
                'password' => 'required|password',
                'confirmed_password' => 'required|confirmed'
            ]);

            if($request->ErrorCount() == 0){
                if($this->employe_model->ChangePassword($data['password'],$email)){
                    (new UserController())->CheckLogin([
                        'email'=> $email,
                        'password' => $data['password']
                    ]);
                }
                else {
                     session::Set('faild','can not password change');
                     redirect::To('ResetPassword/reset/'.$token.'/'.$email);
                }
            }
            //if exists error return data to current page
            return $data;
        }
        else{
            //if not click to button save
            return null;
        }
    }
}