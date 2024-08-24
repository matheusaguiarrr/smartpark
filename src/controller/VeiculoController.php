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
    if(is_null($veiculos) && !is_null($motoristas)){
        loadTemplateView('veiculo', ['veiculos' => $veiculos, 'motoristas' => $motoristas]);
    }
    else {
        loadTemplateView('veiculo');
    }