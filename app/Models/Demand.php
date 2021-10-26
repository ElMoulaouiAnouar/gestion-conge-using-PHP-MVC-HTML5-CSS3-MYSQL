<?php 
class Demand{

    private $db = null;

    public function __construct(){
        $this->db =  new Database();
    }

    public function AllDemands($status = ''){
        $this->db->Query("SELECT d.id_demande,d.date_demande,d.date_debut,d.date_fin,d.etat,concat(e.nom,' ',e.prenom)as 'nomPrenom',e.email from demande_conge d INNER JOIN employes e ON d.id_employe=e.id_employe where etat like concat('%',:status,'%') order by d.id_demande DESC");
        $this->db->Execute(['status'=>$status]);
        return $this->db->DataResult();
    }

    public function delete($id){
        $this->db->Query('DELETE from demande_conge where id_demande=:id');
        if($this->db->Execute(['id'=>$id])){
            return true;
        }
        else
            return false;
    }
    //function update etat 
    public function updateStatus($status,$id){
        $this->db->Query('UPDATE demande_conge set etat=:status where id_demande=:id');
        if($this->db->Execute(['status'=>$status,'id'=>$id])){
            return true;
        }
        else
            return false;
    }
    //function get total demand where condition to column etat 
    public function TotalDemands($status = ''){
         $this->db->Query("SELECT COUNT(*) as total from demande_conge WHERE etat like concat('%',:status,'%')");
         $this->db->Execute(['status' => $status]);
         return $this->db->Single()->total;
    }

    //function get all demandes currecnt user
    public function MyDemande($id,$status = ''){
        $this->db->Query("SELECT * from demande_conge where id_employe=:id and etat like concat('%',:status,'%')");
        $this->db->Execute(['id'=>$id,'status' => $status]);
        return $this->db->DataResult();
    }

    //funciton inser damande
    public function insert($date_debut,$date_fin){
        $this->db->Query("INSERT INTO demande_conge(date_demande,date_debut,date_fin,id_employe,etat) values(NOW(),:db,:df,:id,:etat)");
        if($this->db->Execute([
            'db' => $date_debut,
            'df' =>$date_fin,
            'id' => $_SESSION['user_id'],
            'etat' => 'attend'
        ])){
            //send notification
            return true;
        }
        else{
            return true;
        }
    }

    public function GetDemande($id_demande){
        $this->db->Query("SELECT * FROM demande_conge where id_demande like :id");
        $this->db->Execute(['id' => $id_demande]);
        return $this->db->FetchArray();
    }

}