<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../model/Veiculo.php';
    require_once '../model/Motorista.php';
    require_once '../model/Estacionamento.php';
    require_once '../config/load.php';
    $motoristas = Motorista::listar();
    $veiculos = Veiculo::listarTodos();
    $estacionamento = Estacionamento::listar($_SESSION['id']);
    if(isset($_POST['cadastrar'])){
        $veiculo = new Veiculo($_POST['motorista'], $_POST['cor'], $_POST['ano'], $_POST['marca'], $_POST['modelo'], $_POST['categoria'], $_POST['placa']);
        $veiculo->cadastrar();
        header('Location: VeiculoController.php');
    }
    if(isset($_POST['excluir'])){
        $veiculo = Veiculo::listarUm($_POST['id']);
        $veiculo->excluir();
        header('Location: VeiculoController.php');
    }
    if(!is_null($veiculos) && !is_null($motoristas)){
        foreach($veiculos as $veiculo){
            $motorista = Motorista::buscarPorId($veiculo->motorista);
            $veiculo->motorista = $motorista->getNome();
        }
        loadTemplateView('veiculo', ['veiculos' => $veiculos, 'motoristas' => $motoristas]);
    }
    else if(!is_null($estacionamento) && !is_null($motoristas)){
        loadTemplateView('veiculo', ['estacionamento' => $estacionamento, 'motoristas' => $motoristas]);
    }
    else if(!is_null($estacionamento)){
        loadTemplateView('veiculo', ['estacionamento' => $estacionamento]);
    }
    elseif(!is_null($motoristas)){
        loadTemplateView('veiculo', ['motoristas' => $motoristas]);
    }
    else {
        loadTemplateView('veiculo');
    }