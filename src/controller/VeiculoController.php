<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../model/Veiculo.php';
    require_once '../model/Motorista.php';
    require_once '../config/load.php';
    $motoristas = Motorista::listar();
    $veiculos = Veiculo::listarTodos();
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
    elseif(!is_null($motoristas)){
        loadTemplateView('veiculo', ['motoristas' => $motoristas]);
    }
    else {
        loadTemplateView('veiculo');
    }