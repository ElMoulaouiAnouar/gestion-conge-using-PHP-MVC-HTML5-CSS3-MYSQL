<?php
class Database{
    
    private $db_name = 'gestion_conge_php';
    private $db_host = DB_HOST;
    private $db_username = DB_USERNAME;
    private $db_password = DB_PASSWORD;
    private $db_charset = DB_CHARSET;

    private $statement = null;
    private $provider = null;

    public function __construct(){
        $this->provider = new PDO("mysql:host=$this->db_host;dbname=$this->db_name;charset=$this->db_charset;",$this->db_username,$this->db_password);
        $this->provider->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->provider->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        $this->provider->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER);
        $this->provider->setAttribute(PDO::ATTR_PERSISTENT,true);
    }

    public function query($sql){
        $this->statement = $this->provider->prepare($sql);
    }

    public function Execute($params = []){
        if(is_null($params)){
            $this->statement->execute();
        }
        else{
            $this->statement->execute($params);
        }
    }

    public function DataResult(){
        //$this->Execute() ? is_null($params) : $this->Execute($params); 
        return $this->statement->fetchAll();
    }

    public function Single(){
        return $this->statement->fetch();
    }

}