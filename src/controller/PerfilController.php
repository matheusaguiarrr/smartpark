<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../model/Usuario.php';
    require_once '../model/Estacionamento.php';
    require_once '../config/load.php';
    $usuario = Usuario::buscar($_SESSION['id']);
    $estacionamento = Estacionamento::listar($_SESSION['id']);
    if(isset($_POST['editar'])){
        $usuario->setNome($_POST['nome']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->atualizar();
        header('Location: PerfilController.php');
    }
    if(!is_null($estacionamento)){
        loadTemplateView('perfil', ['usuario' => $usuario, 'estacionamento' => $estacionamento]);
    }
    else {
        loadTemplateView('perfil', ['usuario' => $usuario]);
    }