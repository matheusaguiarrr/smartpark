<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../model/Motorista.php';
    require_once '../config/load.php';
    if(isset($_POST['cadastrar'])){
        $motorista = new Motorista($_POST['cpf'], $_POST['nome'], $_POST['telefone']);
        $motorista->cadastrar();
    }
    // if(isset($_POST['editar'])){
    //     $motorista->cadastrar();
    // }
    if(isset($_POST['excluir'])){
        Motorista::deletar($_POST['id']);
    }
    $motoristas = Motorista::listar();
    if(!is_null($motoristas)){
        loadTemplateView('motorista', ['motoristas' => $motoristas]);
    }
    else {
        loadTemplateView('motorista');
    }
