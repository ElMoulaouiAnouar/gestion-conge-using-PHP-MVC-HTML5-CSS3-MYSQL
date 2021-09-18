<?php
class Database{

    private $db_name = DB_NAME;
    private $db_host = DB_HOST;
    private $db_username = DB_USERNAME;
    private $db_password = DB_PASSWORD;
    private $db_charset = DB_CHARSET;
    
    private $statment = null;
    private $cnx = null;

    public function __construct()
    {
        $this->cnx = new PDO("mysql:host=$this->db_host;dbaname=$this->db_name;charset=$this->db_charset;",$this->db_username,$this->db_password);
        $this->cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }



    public function query($sql){
        $this->statement = $this->cnx->prepare($sql);
    }



    public function Execute($params = []){
        if(isset($params)){
            return $this->statement->execute($params);
        }
        else{
            return $this->statement->execute();
        }
    }


    public function DataResult($params = []){
        if(isset($params)){
            $this->Execute($params);
        }
        else{
            $this->Execute();
        }
        return $this->statement->fetchAll(PDO::FETCH_OBJ);  
    }

    public function SingleResult($param = []){
        if(isset($param)){
            $this->Execute($param);
        }
        else{
            $this->Execute();
        }
        return $this->statement->fetch(PDO::FETCH_OBJ);  
    }

    public function RowCount(){
        $this->Execute();
        return $this->rowCount();
    }

}