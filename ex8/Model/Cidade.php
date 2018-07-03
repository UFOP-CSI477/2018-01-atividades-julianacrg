<?php

require_once 'database.php';

class Cidade {
    
    private $id;
    private $nome;
    private $estado_id;

    public function __construct() {        
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;
    }
    
    function setId($value) {
        $this->id = $value;
    }

    function setNome($value) {
        $this->nome = $value;
    }

    function setEstado_id($value) {
        $this->estado_id = $value;
    }

    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `cidades`(`nome`,`estado_id`) VALUES(:nome,:estado_id)");
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":estado_id", $this->estado_id);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0; 
        }
    }
    
    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `cidades` WHERE `id` = :id");
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `cidades` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}