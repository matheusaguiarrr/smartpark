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
    public static function ocupar($vaga, $motorista, $veiculo, $usuario) {
        $vaga->setStatus("ocupada");
        $sql1 = "UPDATE vagas SET status = ? WHERE id = ?";
        $params1 = array($vaga->getStatus(), $vaga->getId());
        $sql2 = "INSERT INTO reservas (usuario, motorista, veiculo, vaga, data_horario_entrada, data_horario_saida, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params2 = array($usuario, $motorista, $veiculo, $vaga->getId(), date("Y-m-d H:i:s"), null, "em andamento");
        return Database::executeSQLWithTransaction($sql1, $sql2, $params1, $params2);
    }
    public static function liberar($vaga, $usuario) {
        $vaga->setStatus("disponivel");
        $sql1 = "UPDATE vagas SET status = ? WHERE id = ?";
        $params1 = array($vaga->getStatus(), $vaga->getId());
        $sql2 = "UPDATE reservas SET usuario = ?, data_horario_saida = ?, status = ? WHERE vaga = ?";
        $params2 = array($usuario, date("Y-m-d H:i:s"), "finalizada", $vaga->getId());
        return Database::executeSQLWithTransaction($sql1, $sql2, $params1, $params2);
    }
    public function desativar() {
        $this->status = "indisponivel";
    }
    public function cadastrar($estacionamento){
        $sql = "SELECT count(*) FROM vagas WHERE estacionamento = ?";
        $numeroVagas = Database::getResultFromQuery($sql, array($this->estacionamento), true);
        $numeroVagas = $numeroVagas->fetchColumn();
        if($numeroVagas >= $estacionamento->getVagas()){
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