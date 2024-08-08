<?php
require_once 'Database.php';
class Usuario {
    private $id;
    private $cpf;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $tipo_usuario;
    public function __construct($cpf, $nome, $email, $senha, $telefone, $tipo_usuario) {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->telefone = $telefone;
        $this->tipo_usuario = $tipo_usuario;
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
    public function getEmail() {
        return $this->email;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    public function getTipoUsuario() {
        return $this->tipo_usuario;
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
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function setTipoUsuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }
}