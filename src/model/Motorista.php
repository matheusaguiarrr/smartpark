<?php
require_once 'Database.php';
class Motorista {
    private $id;
    private $cpf;
    private $nome;
    private $telefone;
    public function __construct($cpf, $nome, $telefone) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->telefone = $telefone;
    }
    //Getters
    public function getId() {
        return $this->id;
    }
    public function getCpf() {
        return $this->cpf;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    //Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function cadastrar(){
        $sql = "INSERT INTO motoristas (cpf, nome, telefone) VALUES (?,?,?)";
        $params = array($this->cpf, $this->nome, $this->telefone);
        return Database::executeSQL($sql, $params);
    }
    public static function listar(){
        $sql = "SELECT * FROM motoristas";
        return Database::getResultsFromQuery($sql);
    }
    public static function buscarPorId($id){
        $sql = "SELECT * FROM motoristas WHERE id = ?";
        $params = array($id);
        $result = Database::getResultFromQuery($sql, $params);
        return new Motorista($result['cpf'], $result['nome'], $result['telefone']);
    }
    public function atualizar(){
        $sql = "UPDATE motoristas SET cpf = ?, nome = ?, telefone = ? WHERE id = ?";
        $params = array($this->cpf, $this->nome, $this->telefone, $this->id);
        return Database::executeSQL($sql, $params);
    }
    public function deletar(){
        $sql = "DELETE FROM motoristas WHERE id = ?";
        $params = array($this->id);
        return Database::executeSQL($sql, $params);
    }
}