<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../model/Motorista.php';
    require_once '../model/Estacionamento.php';
    require_once '../config/load.php';
    if(isset($_POST['cadastrar'])){
        $motorista = new Motorista($_POST['nome'], $_POST['telefone'], $_POST['cpf']);
        $motorista->cadastrar();
        addSuccessMensage('Motorista cadastrado com sucesso!');
        header('Location: MotoristaController.php');
        return false;
    }
    if(isset($_POST['buscar'])){
        $motorista = Motorista::buscarPorId($_POST['id']);
        echo json_encode(
            [
                'id' => $_POST['id'], 
                'nome' => $motorista->getNome(), 
                'telefone' => $motorista->getTelefone()
            ]);
        return false;
    }
    if(isset($_POST['editar'])){
        $motorista = new Motorista($_POST['nome'], $_POST['telefone']);
        $motorista->setId($_POST['id']);
        $motorista->atualizar();
        addSuccessMensage('Motorista atualizado com sucesso!');
        header('Location: MotoristaController.php');
        return false;
    }
    if(isset($_POST['excluir'])){
        Motorista::deletar($_POST['id']);
        addSuccessMensage('Motorista excluído com sucesso!');
        header('Location: MotoristaController.php');
        return false;
    }
    $motoristas = Motorista::listar();
    $estacionamento = Estacionamento::listar($_SESSION['id']);
    if(!is_null($motoristas) && !is_null($estacionamento)){
        loadTemplateView('motorista', ['motoristas' => $motoristas, 'estacionamento' => $estacionamento]);
    }
    else if(!is_null($motoristas)){
        loadTemplateView('motorista', ['motoristas' => $motoristas]);
    }
    else if(!is_null($estacionamento)){
        loadTemplateView('motorista', ['estacionamento' => $estacionamento]);
    }
    else {
        loadTemplateView('motorista');
    }
