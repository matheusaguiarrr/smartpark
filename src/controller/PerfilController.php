<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../model/Usuario.php';
    require_once '../config/load.php';
    $usuario = Usuario::buscar($_SESSION['id']);
    loadTemplateView('perfil', ['usuario' => $usuario]);