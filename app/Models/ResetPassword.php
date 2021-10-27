<?php 
class ResetPassword{

    private $db = null;

    public function  __construct()
    {
        $this->db = new Database();
    }

    public function CreateTabel(){
        $this->db->query("CREATE TABLE resetPasswords(
            id int primary key auto_increment,
            token text,
            date_exp datetime,
            email varchar(50)
        )");
        $this->db->Execute();
    }

    public function insert($token,$date_exp,$email){
        $this->db->Query("INSERT into resetPasswords(token,date_exp,email) values(:t,:d,:e)");
        if($this->db->Execute([
            't' => $token,
            'd' => $date_exp,
            'e' => $email
        ])){
            return true;
        }
        else
            return false;
    }

    public function checkToken($token,$email){
        $this->db->Query("SELECT token,date_exp from resetPasswords where email=:e");
        $this->db->Execute(['e' => $email]);
        $value = $this->db->Single();
        if($value){
            if($value->token == $token){
                //verfier date_expert
                date_default_timezone_set('America/New_York');
                $value =  explode(' ',$value->date_exp);
                if($value[0] === date('Y-m-d')){
                    if($value[1] >= date('H:i:s'))
                        echo true;
                    else
                        echo 'token expert';
                }
                else{
                    return 'token expert';
                }
            }
            else{
                return 'token inccorrect';
            }
        }
        else{
            return 'token inccorrect';
        }
    }

    public function get(){
        $this->db->Query("SELECT * from resetPasswords");
        $this->db->Execute();
        return $this->db->Single();
    }

}