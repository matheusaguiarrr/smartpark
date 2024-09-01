<?php
    require_once '../config/load.php';
    require_once '../model/Usuario.php';
    error_reporting(E_ALL);
    loadView('login');
    if(count($_POST) > 0) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuario = Usuario::autenticar($email, $senha);
        if($usuario == false) {
            header('Location: ../controller/LoginController.php');
        } else {
            session_start();
            $_SESSION['id'] = $usuario->getId();
            header('Location: ../controller/IndexController.php');
        }
    }