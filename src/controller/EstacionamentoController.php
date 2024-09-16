<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../config/load.php';
    require_once '../config/util.php';
    require_once '../model/Estacionamento.php';
    require_once '../model/Vaga.php';
    $estacionamento = Estacionamento::listar($_SESSION['id']);
    $vagas = Vaga::listar($estacionamento->getId());
    if(isset($_POST['cadastrar'])){
        if(isset($_FILES['foto'])){
            $imagem = $_FILES['foto']['name'];
            $extensao = pathinfo($imagem, PATHINFO_EXTENSION);
            $novo_nome = md5(microtime()).".".$extensao;
            $diretorio = "../imagens/";
            $estacionamento = new Estacionamento
            (
                $_SESSION['id'] ,
                null, 
                $_POST['cnpj'], 
                $_POST['nome'], 
                $_POST['telefone'], 
                $_POST['vagas'], 
                $_POST['cep'], 
                $_POST['estado'], 
                $_POST['cidade'], 
                $_POST['bairro'], 
                $_POST['rua'], 
                $_POST['numero'], 
                $_POST['complemento'], 
                $novo_nome
            );
            $estacionamento->cadastrarComImagem();
            move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);
        }
        else {
            $estacionamento = new Estacionamento
            (
                $_SESSION['id'] ,
                null, 
                $_POST['cnpj'], 
                $_POST['nome'], 
                $_POST['telefone'], 
                $_POST['vagas'], 
                $_POST['cep'], 
                $_POST['estado'], 
                $_POST['cidade'], 
                $_POST['bairro'], 
                $_POST['rua'], 
                $_POST['numero'], 
                $_POST['complemento'], 
                null
            );
            $estacionamento->cadastrar();
        }
        addSuccessMensage('Estacionamento cadastrado com sucesso!');
        header('Location: EstacionamentoController.php');
        return false;
    }
    if(isset($_POST['buscar'])){
        $estacionamento = Estacionamento::listar($_SESSION['id']);
        echo json_encode(
            [
                'id' => $estacionamento->getId(), 
                'nome' => $estacionamento->getNome(), 
                'telefone' => $estacionamento->getTelefone(), 
                'vagas' => $estacionamento->getVagas(), 
                'cep' => $estacionamento->getCep(), 
                'estado' => $estacionamento->getEstado(), 
                'cidade' => $estacionamento->getCidade(), 
                'bairro' => $estacionamento->getBairro(), 
                'rua' => $estacionamento->getRua(), 
                'numero' => $estacionamento->getNumero(), 
                'complemento' => $estacionamento->getComplemento()
            ]);
        return false;
    }
    if(isset($_POST['editar'])){
        if(isset($_FILES['foto'])){
            $imagem = $_FILES['foto']['name'];
            $extensao = pathinfo($imagem, PATHINFO_EXTENSION);
            $novo_nome = md5(microtime()).".".$extensao;
            $diretorio = "../imagens/";
            $estacionamento = new Estacionamento
            (
                $_SESSION['id'] ,
                $_POST['id'], 
                $_POST['cnpj'], 
                $_POST['nome'], 
                $_POST['telefone'], 
                $_POST['vagas'], 
                $_POST['cep'], 
                $_POST['estado'], 
                $_POST['cidade'], 
                $_POST['bairro'], 
                $_POST['rua'], 
                $_POST['numero'], 
                $_POST['complemento'], 
                $novo_nome
            );
            $estacionamento->atualizarComImagem();
            move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);
        }
        else {
            $estacionamento = new Estacionamento
            (
                $_SESSION['id'] ,
                $_POST['id'], 
                null, 
                $_POST['nome'], 
                $_POST['telefone'], 
                $_POST['vagas'], 
                $_POST['cep'], 
                $_POST['estado'], 
                $_POST['cidade'], 
                $_POST['bairro'], 
                $_POST['rua'], 
                $_POST['numero'], 
                $_POST['complemento'], 
                null
            );
            $estacionamento->atualizar();
        }
        addSuccessMensage('Estacionamento editado com sucesso!');
        header('Location: EstacionamentoController.php');
        return false;
    }
    loadTemplateView('estacionamentoPerfil', ['estacionamento' => $estacionamento, 'vagas' => $vagas]);