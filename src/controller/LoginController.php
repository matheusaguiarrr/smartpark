<?php
    session_start();
    require_once '../config/load.php';
    require_once '../config/util.php';
    require_once '../model/Usuario.php';
    error_reporting(E_ALL);
    if(count($_POST) > 0) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $retorno = Usuario::autenticar($email, $senha);
        if($retorno['status'] == 'error'){
            addErrorMensage($retorno['message']);
            header('Location: LoginController.php');
            return false;
        }
        else {
            $_SESSION['id'] = $retorno['usuario']->getId();
            header('Location: IndexController.php');
        }
    }
    loadView('login');