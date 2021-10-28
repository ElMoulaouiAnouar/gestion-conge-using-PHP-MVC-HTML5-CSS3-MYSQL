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
    public function deleteAllResetPasswordToEmail($email){
        $this->db->Query('DELETE from resetPasswords where email=:e');
        $this->db->Execute(['e'=>$email]);
    }

    public function insert($token,$date_exp,$email){
        $this->deleteAllResetPasswordToEmail($email);
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

    public function getTokenAndDateExp($email){
        $this->db->Query("SELECT token,date_exp from resetPasswords where email=:e");
        $this->db->Execute(['e' => $email]);
        return $this->db->Single();
    }

}