<?php
    session_start();
    require_once '../config/load.php';
    require_once '../config/util.php';
    require_once '../model/Usuario.php';
    error_reporting(E_ALL);
    if(isset($_POST['confirmacao'])){
        $codigo = $_POST['codigo'];
        $usuario = Usuario::buscarPorEmail($_SESSION['email']);
        if(!is_null($usuario)){
            if($usuario->getCodigoVerificacao() == $codigo){
                $retorno = Usuario::ativarCadastro($_SESSION['email'], $codigo);
                if($retorno){
                    addSuccessMensage('Cadastro ativado com sucesso!');
                    header('Location: LoginController.php');
                    return false;
                }
            }
            else {
                addErrorMensage('Código inválido!');
                header('Location: ConfirmacaoEmailController.php');
                return false;
            }
        } else {
            addErrorMensage('Usuário não encontrado!');
            header('Location: ConfirmacaoEmailController.php');
            return false;
        }
    }
    loadView('confirmacaoEmail');