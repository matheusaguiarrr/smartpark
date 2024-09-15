<?php
    require_once '../config/load.php';
    require_once '../config/util.php';
    require_once '../config/email.php';
    require_once '../model/Usuario.php';
    error_reporting(E_ALL);
    if(isset($_POST['cadastro'])) {
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $usuario = new Usuario($cpf, $nome, $email, $senha, $telefone);
        $retorno = $usuario->cadastrar();
        if($retorno) {
            $codigo = enviarEmail($email);
            Usuario::guardarCodigo($email, $codigo);
            session_start();
            $_SESSION['email'] = $email;
            addSuccessMensage('Cadastro realizado com sucesso! Verifique seu e-mail para ativar sua conta.');
            header('Location: ConfirmacaoEmailController.php');
            return false;
        }
    }
    loadView('cadastro');