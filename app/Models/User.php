<?php 
class User{
    
    private $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function checkLogin($data){
        $this->db->query("select * from employes WHERE email like :email and pass like :pass");
        $this->db->Execute([':email' => $data['email'],':pass' => $data['password']]);
        $user = $this->db->Single();
        if($user){
            return $user;
        }
        else{
            return false;
        }
    }

   public function getUser($id){
       $this->db->query("select * from employes where id_employe like :id");
       $this->db->Execute(['id'=>$id]);
       return $this->db->FetchArray();
   }

}