<?php
require_once 'Database.php';
class Vaga {
    private $estacionamento;
    private $id;
    private $identificador;
    private $status;

    public function __construct($estacionamento, $id, $identificador, $status = "disponivel") {
        $this->estacionamento = $estacionamento;
        $this->id = $id;
        $this->identificador = $identificador;
        $this->status = $status;
    }
    //Getters
    public function getEstacionamento() {
        return $this->estacionamento;
    }
    public function getId() {
        return $this->id;
    }
    public function getIdentificador() {
        return $this->identificador;
    }
    public function getStatus() {
        return $this->status;
    }
    //Setters
    public function setEstacionamento($estacionamento) {
        $this->estacionamento = $estacionamento;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function setIdentificador($identificador) {
        $this->identificador = $identificador;
    }
    public function setStatus($status) {
        $this->status = $status;
    }
    //Métodos
    public function ocupar() {
        $this->status = "ocupado";
    }
    public function liberar() {
        $this->status = "disponivel";
    }
    public function desativar() {
        $this->status = "indisponivel";
    }
    public function cadastrar($estacionamento){
        $sql = "SELECT count(*) FROM vagas WHERE estacionamento = ?";
        $numeroVagas = Database::getResultFromQuery($sql, array($this->estacionamento));
        if($numeroVagas == $estacionamento->getVagas()){
            return false;
        }
        $sql = "INSERT INTO vagas (estacionamento, identificador_vaga, status) VALUES (?, ?, ?)";
        $params = array($this->estacionamento, $this->identificador, $this->status);
        return Database::executeSQL($sql, $params);
    }
    public static function atualizar($identificador, $status, $id){
        $sql = "UPDATE vagas SET identificador_vaga = ?, status = ? WHERE id = ?";
        $params = array($identificador, $status, $id);
        return Database::executeSQL($sql, $params);
    }
    public function deletar(){
        $sql = "DELETE FROM vagas WHERE id = ?";
        $params = array($this->id);
        return Database::executeSQL($sql, $params);
    }
    public static function buscarPorId($id){
        $sql = "SELECT * FROM vagas WHERE id = ?";
        $params = array($id);
        $result = Database::getResultFromQuery($sql, $params);
        if($result){
            return new Vaga($result->estacionamento, $result->id, $result->identificador_vaga, $result->status);
        } else {
            return null;
        }
    }
    public static function listar($estacionamento){
        $sql = "SELECT * FROM vagas WHERE estacionamento = ?";
        $params = array($estacionamento);
        $result = Database::getResultsFromQuery($sql, $params);
        $vagas = array();
        if($result){
            foreach($result as $row){
                $vaga = new Vaga($row->estacionamento, $row->id, $row->identificador_vaga, $row->status);
                array_push($vagas, $vaga);
            }
            return $vagas;
        }
        return null;
    }
}