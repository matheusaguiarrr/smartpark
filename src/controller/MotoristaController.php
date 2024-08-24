<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../model/Motorista.php';
    require_once '../config/load.php';
    $motoristas = Motorista::listar();
    if(!is_null($motoristas)){
        loadTemplateView('motorista', ['motoristas' => $motoristas]);
    }
    else {
        loadTemplateView('motorista');
    }

    if(isset($_POST['cadastrar'])){
        $motorista = new Motorista($_POST['cpf'], $_POST['nome'], $_POST['telefone']);
        $motorista->cadastrar();
        header('Location: IndexController.php');
    }