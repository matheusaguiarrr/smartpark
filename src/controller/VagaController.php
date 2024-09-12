<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: LoginController.php');
    }
    require_once '../config/load.php';
    require_once '../config/util.php';
    require_once '../model/Vaga.php';
    require_once '../model/Estacionamento.php';
    $estacionamento = Estacionamento::listar($_SESSION['id']);
    $vagas = Vaga::listar($estacionamento->getId());
    if(isset($_POST['cadastrar'])){
        $vaga = new Vaga($_POST['estacionamento'], null, $_POST['identificador']);
        $retorno = $vaga->cadastrar($estacionamento);
        print_r($retorno);
        if($retorno == false){
            addWarningMensage("Limite de vagas atingido!");
        }
        else {
            addSuccessMensage('Vaga cadastrada com sucesso!');
        }
        header('Location: VagaController.php');
        return false;
    }
    if(isset($_POST['buscar'])){
        $vaga = Vaga::buscarPorId($_POST['id']);
        echo json_encode([
            'id' => $vaga->getId(),
            'identificador' => $vaga->getIdentificador(),
            'status' => $vaga->getStatus()
        ]);
        return false;
    }
    if(isset($_POST['editar'])){
        Vaga::atualizar($_POST['identificador'], $_POST['status'], $_POST['id']);
        addSuccessMensage('Vaga atualizada com sucesso!');
        header('Location: VagaController.php');
        return false;
    }
    if(isset($_POST['deletar'])){
        $vaga = new Vaga($_POST['estacionamento'], $_POST['deletar'], null);
        $vaga->deletar();
        addSuccessMensage('Vaga deletada com sucesso!');
        header('Location: VagaController.php');
        return false;
    }
    if($estacionamento && !is_null($vagas)){
        loadTemplateView('vaga', ['estacionamento' => $estacionamento, 'vagas' => $vagas]);
    }
    elseif($estacionamento){
        loadTemplateView('vaga', ['estacionamento' => $estacionamento]);
    }
    else {
        loadTemplateView('vaga');
    }