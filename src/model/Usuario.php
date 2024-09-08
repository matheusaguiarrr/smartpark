<?php
require_once 'Database.php';
class Usuario {
    private $id;
    private $cpf;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $imagem;
    public function __construct($cpf, $nome, $email, $senha, $telefone, $imagem = null, $id = null){
        $this->id = $id;
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->telefone = $telefone;
        $this->imagem = $imagem;
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
    public function getImagem() {
        return $this->imagem;
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
    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }
    public function cadastrar(){
        $sql = "INSERT INTO usuarios (cpf, nome, email, senha, telefone) VALUES (?,?,?,?,?)";
        $senhaCriptografada = password_hash($this->senha, PASSWORD_DEFAULT);
        $params = array($this->cpf, $this->nome, $this->email, $senhaCriptografada, $this->telefone);
        return Database::executeSQL($sql, $params);
    }
    public function atualizar(){
        $sql = "UPDATE usuarios SET nome = ?, telefone = ? WHERE id = ?";
        $params = array($this->nome, $this->telefone, $this->id);
        return Database::executeSQL($sql, $params);
    }
    public function atualizarComImagem(){
        $sql = "UPDATE usuarios SET nome = ?, telefone = ?, imagem = ? WHERE id = ?";
        $params = array($this->nome, $this->telefone, $this->imagem, $this->id);
        return Database::executeSQL($sql, $params);
    }
    public static function autenticar($email, $senha){
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $params = array($email);
        $result = Database::getResultFromQuery($sql, $params);
        if(!$result){
            return false;
        } else if(!password_verify($senha, $result->senha)){
            return false;
        }
        $usuario = new Usuario($result->cpf, $result->nome, $result->email, $result->senha, $result->telefone, $result->tipo_usuario);
        $usuario->setId($result->id);
        return $usuario;
    }

    public static function buscar($id){
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $params = array($id);
        $result = Database::getResultFromQuery($sql, $params);
        if($result){
            $usuario = new Usuario($result->cpf, $result->nome, $result->email, $result->senha, $result->telefone, $result->imagem, $result->id);
            return $usuario;
        }
        return null;
    }

    public static function listar(){
        $sql = "SELECT * FROM usuarios";
        $result = Database::getResultsFromQuery($sql);
        if($result){
            $usuarios = [];
            while($row = $result){
                $usuario = new Usuario($row['cpf'], $row['nome'], $row['email'], $row['senha'], $row['telefone']);
                $usuario->setId($row['id']);
                $usuarios[] = $usuario;
            }
            return $usuarios;
        }
        return null;
    }
}