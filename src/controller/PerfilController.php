<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
    require_once '../model/Usuario.php';
    require_once '../model/Estacionamento.php';
    require_once '../config/load.php';
    $usuario = Usuario::buscar($_SESSION['id']);
    $estacionamento = Estacionamento::listar($_SESSION['id']);
    if(isset($_POST['buscar'])){
        $usuario = Usuario::buscar($_POST['id']);
        echo json_encode(
            [
                'id' => $usuario->getId(),
                'nome' => $usuario->getNome(),
                'telefone' => $usuario->getTelefone()
            ]);
        return false;
    }
    if(isset($_POST['editar'])){
        if(isset($_FILES['foto'])){
            $imagem = $_FILES['foto']['name'];
            $extensao = pathinfo($imagem, PATHINFO_EXTENSION);
            $novo_nome = md5(microtime()).".".$extensao;
            $diretorio = "../imagens/users/";
            $usuario = new Usuario
                (
                    null, 
                    $_POST['nome'], 
                    null, 
                    null, 
                    $_POST['telefone'],
                    $novo_nome,
                    $_POST['id']
                );
            $usuario->atualizarComImagem();
            move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);
        } else {
            $usuario = new Usuario
                (
                    null, 
                    $_POST['nome'], 
                    null, 
                    null, 
                    $_POST['telefone'],
                    null,
                    $_POST['id']
                );
            $usuario->atualizar();
        } 
        header('Location: PerfilController.php');
    }
    if(!is_null($estacionamento)){
        loadTemplateView('perfil', ['usuario' => $usuario, 'estacionamento' => $estacionamento]);
    }
    else {
        loadTemplateView('perfil', ['usuario' => $usuario]);
    }