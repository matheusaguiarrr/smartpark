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
    if(isset($_POST['buscar'])){
        $motorista = Motorista::buscarPorId($_POST['id']);
        echo json_encode(['id' => $_POST['id'], 'nome' => $motorista->getNome(), 'cpf' => $motorista->getCpf(), 'telefone' => $motorista->getTelefone()]);
        return false;
    }
    if(isset($_POST['editar'])){
        $motorista = new Motorista($_POST['cpf'], $_POST['nome'], $_POST['telefone']);
        $motorista->setId($_POST['id']);
        $motorista->atualizar();
    }
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
