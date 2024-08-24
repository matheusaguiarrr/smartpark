<?php
    require_once '../model/Usuario.php';
    error_reporting(E_ALL);
    if(count($_POST) > 0) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuario = new Usuario($cpf, $nome, $email, $senha, $telefone);
        $retorno = $usuario->cadastrar();
        if($retorno) {
            header('Location: ../view/login.php');
        }
    }