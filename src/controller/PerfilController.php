<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../model/Usuario.php';
    require_once '../config/load.php';
    $usuario = Usuario::buscar($_SESSION['id']);
    if(isset($_POST['editar'])){
        $usuario->setNome($_POST['nome']);
        $usuario->setTelefone($_POST['telefone']);
        $usuario->atualizar();
        header('Location: PerfilController.php');
    }
    loadTemplateView('perfil', ['usuario' => $usuario]);