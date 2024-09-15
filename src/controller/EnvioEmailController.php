<?php
    session_start();
    require_once '../config/load.php';
    require_once '../config/util.php';
    require_once '../config/email.php';
    require_once '../model/Usuario.php';
    error_reporting(E_ALL);
    if(isset($_POST['enviar'])){
        $usuario = Usuario::buscarPorEmail($_POST['email']);
        if(!is_null($usuario)){
            if($usuario->getVerificado() == 1){
                addErrorMensage('Usuário já verificado! Faça login.');
                header('Location: LoginController.php');
                return false;
            }
            $codigo = enviarEmail($_POST['email']);
            Usuario::guardarCodigo($_POST['email'], $codigo);
            session_start();
            $_SESSION['email'] = $_POST['email'];
            addSuccessMensage('E-mail enviado com sucesso! Verifique sua caixa de e-mail.');
            header('Location: ConfirmacaoEmailController.php');
            return false;
        } else {
            addErrorMensage('Usuário não encontrado!');
            header('Location: EnvioEmailController.php');
            return false;
        }
    }
    loadView('enviarEmail');