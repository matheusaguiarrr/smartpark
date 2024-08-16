<?php
    require_once '../model/Usuario.php';
    error_reporting(E_ALL);
    if(count($_POST) > 0) {
        $email = $_POST['email'];
        $senha = $_POST['password'];
        $usuario = Usuario::autenticar($email, $senha);
        if($usuario == false) {
            header('Location: ../view/login.php');
        } else {
            session_start();
            $_SESSION['id'] = $usuario->getId();
            header('Location: ../view/index.php');
        }
    }