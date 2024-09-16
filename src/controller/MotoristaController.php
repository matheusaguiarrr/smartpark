<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../config/load.php';
    require_once '../config/util.php';
    require_once '../model/Motorista.php';
    require_once '../model/Estacionamento.php';
    require_once '../model/Vaga.php';
    $motoristas = Motorista::listar();
    $estacionamento = Estacionamento::listar($_SESSION['id']);
    $vagas = Vaga::listar($estacionamento->getId());
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
    loadTemplateView('motorista', ['motoristas' => $motoristas, 'estacionamento' => $estacionamento, 'vagas' => $vagas]);
