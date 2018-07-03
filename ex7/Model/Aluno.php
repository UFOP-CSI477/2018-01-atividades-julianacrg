<?php

require_once 'database.php';

class Aluno {
    
    private $id;
    private $nome;
    private $cidade_id;

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

    function setCidade_id($value) {
        $this->cidade_id = $value;
    }

    public function insert(){
        try{
            $stmt = $this->conn->prepare("INSERT INTO `alunos`(`nome`,`cidade_id`) VALUES(:nome,:cidade_id)");
            $stmt->bindParam(":nome", $this->date);
            $stmt->bindParam(":cidade_id", $this->cidade_id);
            $stmt->execute();
            return 1;
        }catch(PDOException $e){
            return 0; 
        }
    }
    
    public function view(){
        $stmt = $this->conn->prepare("SELECT * FROM `alunos` WHERE `id` = :id");
        $stmt->bindParam(":id",$this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_OBJ);
        return $row;
    }
    
    public function index(){
        $stmt = $this->conn->prepare("SELECT * FROM `alunos` WHERE 1");
        $stmt->execute();
        return $stmt;
    }
}