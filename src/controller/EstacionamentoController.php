<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
require_once '../config/load.php';
require_once '../model/Estacionamento.php';
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
}
$estacionamento = Estacionamento::listar($_SESSION['id']);
if($estacionamento){
    loadTemplateView('estacionamento', ['estacionamento' => $estacionamento]);
}
loadTemplateView('estacionamento');