<?php

use App\Models\User;

class Employe{
    private $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }
 
     public function insert($data)
    {
        
        try{
            $this->db->Query("INSERT INTO employes (nom, prenom, dateNaissance, gander, tel, email, pass, id_type_user) VALUES (:nom,:prenom,:daten,:gander,:tel,:email,:pass,:type_user)");
            $pass = password_hash($data['pass'],PASSWORD_DEFAULT);
            if($this->db->Execute([
                'nom'=>$data['nom'],
                'prenom'=>$data['prenom'],
                'daten'=>$data['datenaissance'],
                'gander'=>$data['gander'],
                'tel'=>$data['tel'],
                'email'=>$data['email'],
                'pass'=>$pass,
                'type_user'=>$data['type_user']
            ]))
                return true;
            else 
                return false;
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
       
    }

    //function check if email exists

    public function CheckEmailExist($emial){
        $this->db->Query("select * from employes where email=:email");
        $this->db->Execute(['email' => $emial]);
        if($this->db->single()){
            return true;
        }
        else{
            return false;
        }
    }

    //funcion get all user sans admin

    public function GetAll($idUserCurrent){
        $this->db->Query('select * from employes where id_employe not like :id');
        $this->db->Execute(['id' => $idUserCurrent]);
        return $this->db->DataResult();
    }

    public function update($data,$id){
        try{
            $this->db->Query("update employes set nom=:nom,prenom=:prenom,dateNaissance=:daten,gander=:gander,tel=:tel,pass=:pass where id_employe=:id");
            $pass = password_hash($data['pass'],PASSWORD_DEFAULT);
            if($this->db->Execute([
                'nom'=>$data['nom'],
                'prenom'=>$data['prenom'],
                'daten'=>$data['datenaissance'],
                'gander'=>$data['gander'],
                'tel'=>$data['tel'],
                'id'=>$id,
                'pass'=>$pass
            ]))
                return true;
            else 
                return false;
        }
        catch(PDOException $ex){
            die($ex->getMessage());
        }
    }

    public function delete($id){
        $this->db->Query("delete from employes where id_employe=:id");
        if($this->db->execute(['id'=>$id]))
            return true;
        else
            return false;   
    }

    public function ChangePassword($nvpass,$emial){
        $nvpass = password_hash($nvpass,PASSWORD_DEFAULT);
        $this->db->Query('UPDATE employes set pass=:p where email=:e');
        if($this->db->Execute([
            'p' => $nvpass,
            'e' => $emial
        ])){
            return true;
        }
        else
            return false;
        
    }
}