<?php
require_once 'Database.php';
    class Estacionamento {
        private $proprietario;
        private $id;
        private $cnpj;
        private $nome;
        private $telefone;
        private $vagas;
        private $cep;
        private $estado;
        private $cidade;
        private $bairro;
        private $rua;
        private $numero;
        private $complemento;
        private $imagem;
        public function __construct($proprietario, $id, $cnpj, $nome, $telefone, $vagas, $cep, $estado, $cidade, $bairro, $rua, $numero, $complemento, $imagem) {
            $this->proprietario = $proprietario;
            $this->id = $id;
            $this->cnpj = $cnpj;
            $this->nome = $nome;
            $this->telefone = $telefone;
            $this->vagas = $vagas;
            $this->cep = $cep;
            $this->estado = $estado;
            $this->cidade = $cidade;
            $this->bairro = $bairro;
            $this->rua = $rua;
            $this->numero = $numero;
            $this->complemento = $complemento;
            $this->imagem = $imagem;
        }
        //Getters
        public function getProprietario() {
            return $this->proprietario;
        }
        public function getId() {
            return $this->id;
        }
        public function getCnpj() {
            return $this->cnpj;
        }
        public function getNome() {
            return $this->nome;
        }
        public function getTelefone() {
            return $this->telefone;
        }
        public function getVagas() {
            return $this->vagas;
        }
        public function getCep() {
            return $this->cep;
        }
        public function getEstado() {
            return $this->estado;
        }
        public function getCidade() {
            return $this->cidade;
        }
        public function getBairro() {
            return $this->bairro;
        }
        public function getRua() {
            return $this->rua;
        }
        public function getNumero() {
            return $this->numero;
        }
        public function getComplemento() {
            return $this->complemento;
        }
        public function getImagem() {
            return $this->imagem;
        }
        //Setters
        public function setProprietario($proprietario) {
            $this->proprietario = $proprietario;
        }
        public function setId($id) {
            $this->id = $id;
        }
        public function setCnpj($cnpj) {
            $this->cnpj = $cnpj;
        }
        public function setNome($nome) {
            $this->nome = $nome;
        }
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
        public function setVagas($vagas) {
            $this->vagas = $vagas;
        }
        public function setCep($cep) {
            $this->cep = $cep;
        }
        public function setEstado($estado) {
            $this->estado = $estado;
        }
        public function setCidade($cidade) {
            $this->cidade = $cidade;
        }
        public function setBairro($bairro) {
            $this->bairro = $bairro;
        }
        public function setRua($rua) {
            $this->rua = $rua;
        }
        public function setNumero($numero) {
            $this->numero = $numero;
        }
        public function setComplemento($complemento) {
            $this->complemento = $complemento;
        }
        public function setImagem($imagem) {
            $this->imagem = $imagem;
        }
        public function cadastrar(){
            $sql = "INSERT INTO estacionamentos (proprietario, cnpj, nome, telefone, cep, estado, cidade, bairro, rua, numero, complemento, quantidade_vagas) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $params = array($this->proprietario, $this->cnpj, $this->nome, $this->telefone, $this->cep, $this->estado, $this->cidade, $this->bairro, $this->rua, $this->numero, $this->complemento, $this->vagas);
            return Database::executeSQL($sql, $params);
        }
        public function cadastrarComImagem(){
            $sql = "INSERT INTO estacionamentos (proprietario, cnpj, nome, telefone, cep, estado, cidade, bairro, rua, numero, complemento, quantidade_vagas, imagem) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $params = array($this->proprietario, $this->cnpj, $this->nome, $this->telefone, $this->cep, $this->estado, $this->cidade, $this->bairro, $this->rua, $this->numero, $this->complemento, $this->vagas, $this->imagem);
            return Database::executeSQL($sql, $params);
        }
        public function atualizar(){
            $sql = "UPDATE estacionamentos SET nome = ?, telefone = ?, cep = ?, estado = ?, cidade = ?, bairro = ?, rua = ?, numero = ?, complemento = ?, quantidade_vagas = ? WHERE id = ?";
            $params = array($this->nome, $this->telefone, $this->cep, $this->estado, $this->cidade, $this->bairro, $this->rua, $this->numero, $this->complemento, $this->vagas, $this->id);
            return Database::executeSQL($sql, $params);
        }
        public function atualizarComImagem(){
            $sql = "UPDATE estacionamentos SET nome = ?, telefone = ?, cep = ?, estado = ?, cidade = ?, bairro = ?, rua = ?, numero = ?, complemento = ?, quantidade_vagas = ?, imagem = ? WHERE id = ?";
            $params = array($this->nome, $this->telefone, $this->cep, $this->estado, $this->cidade, $this->bairro, $this->rua, $this->numero, $this->complemento, $this->vagas, $this->imagem, $this->id);
            return Database::executeSQL($sql, $params);
        }
        public function deletar(){
            $sql = "DELETE FROM estacionamentos WHERE id = ?";
            $params = array($this->id);
            return Database::executeSQL($sql, $params);
        }
        public static function listar($proprietario){
            $sql = "SELECT * FROM estacionamentos WHERE proprietario = ?";
            $params = array($proprietario);
            $result = Database::getResultFromQuery($sql, $params);
            if($result){
                $estacionamento = new Estacionamento($result->proprietario, $result->id, $result->cnpj, $result->nome, $result->telefone, $result->quantidade_vagas, $result->cep, $result->estado, $result->cidade, $result->bairro, $result->rua, $result->numero, $result->complemento, $result->imagem);
                return $estacionamento;
            }
            return null;
        }
    }
