<?php
    require_once 'Database.php';
    class Veiculo{
        private $motorista;
        private $id;
        private $cor;
        private $ano;
        private $marca;
        private $modelo;
        private $categoria;
        private $placa;
        function __construct($motorista, $cor, $ano, $marca, $modelo, $categoria, $placa){
            $this->motorista = $motorista;
            $this->cor = $cor;
            $this->ano = $ano;
            $this->marca = $marca;
            $this->modelo = $modelo;
            $this->categoria = $categoria;
            $this->placa = $placa;
        }

        public function getMotorista(){
            return $this->motorista;
        }
        public function getId(){
            return $this->id;
        }
        public function getCor(){
            return $this->cor;
        }
        public function getAno(){
            return $this->ano;
        }
        public function getMarca(){
            return $this->marca;
        }
        public function getModelo(){
            return $this->modelo;
        }
        public function getCategoria(){
            return $this->categoria;
        }
        public function getPlaca(){
            return $this->placa;
        }

        public function setMotorista($motorista){
            $this->motorista = $motorista;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function setCor($cor){
            $this->cor = $cor;
        }
        public function setAno($ano){
            $this->ano = $ano;
        }
        public function setMarca($marca){
            $this->marca = $marca;
        }
        public function setModelo($modelo){
            $this->modelo = $modelo;
        }
        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }
        public function setPlaca($placa){
            $this->placa = $placa;
        }

        public function cadastrar(){
            $sql = "INSERT INTO veiculos (motorista, cor, ano, marca, modelo, categoria, placa) VALUES (?,?,?,?,?,?,?)";
            $params = array($this->motorista, $this->cor, $this->ano, $this->marca, $this->modelo, $this->categoria, $this->placa);
            return Database::executeSQL($sql, $params);
        }
        public function atualizar(){
            $sql = "UPDATE veiculos SET motorista = ?, cor = ?, ano = ?, marca = ?, modelo = ?, categoria = ?, placa = ? WHERE id = ?";
            $params = array($this->motorista, $this->cor, $this->ano, $this->marca, $this->modelo, $this->categoria, $this->placa, $this->id);
            return Database::executeSQL($sql, $params);
        }
        public function excluir(){
            $sql = "DELETE FROM veiculos WHERE id = ?";
            $params = array($this->id);
            return Database::executeSQL($sql, $params);
        }
        public static function listarTodos(){
            $sql = "SELECT * FROM veiculos";
            $result = Database::getResultsFromQuery($sql);
            if($result){
                $veiculos = [];
                while($row = $result){
                    $veiculo = new Veiculo($row['motorista'], $row['cor'], $row['ano'], $row['marca'], $row['modelo'], $row['categoria'], $row['placa']);
                    $veiculo->setId($row['id']);
                    $veiculos[] = $veiculo;
                }
                return $veiculos;
            }
            return null;
        }
        public static function listarUm($id){
            $sql = "SELECT * FROM veiculos WHERE id = ?";
            $params = array($id);
            $result = Database::getResultFromQuery($sql, $params);
            if($result){
                $veiculo = new Veiculo($result->motorista, $result->cor, $result->ano, $result->marca, $result->modelo, $result->categoria, $result->placa);
                $veiculo->setId($result->id);
                return $veiculo;
            }
            return null;
        }
    }