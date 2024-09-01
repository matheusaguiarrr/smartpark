<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
require_once '../config/load.php';
require_once '../model/Estacionamento.php';
if(isset($_POST['cadastrar'])){
    $estacionamento = new Estacionamento($_SESSION['id'] ,null, $_POST['cnpj'], $_POST['nome'], $_POST['telefone'], $_POST['vagas'], $_POST['cep'], $_POST['estado'], $_POST['cidade'], $_POST['bairro'], $_POST['rua'], $_POST['numero'], $_POST['complemento']);
    // print_r($estacionamento->getProprietario());
    // echo "<br>";
    // print_r($estacionamento->getCnpj());
    // echo "<br>";
    // print_r($estacionamento->getNome());
    // echo "<br>";
    // print_r($estacionamento->getTelefone());
    // echo "<br>";
    // print_r($estacionamento->getVagas());
    // echo "<br>";
    // print_r($estacionamento->getCep());
    // echo "<br>";
    // print_r($estacionamento->getEstado());
    // echo "<br>";
    // print_r($estacionamento->getCidade());
    // echo "<br>";
    // print_r($estacionamento->getBairro());
    // echo "<br>";
    // print_r($estacionamento->getRua());
    // echo "<br>";
    // print_r($estacionamento->getNumero());
    // echo "<br>";
    // print_r($estacionamento->getComplemento());
    // echo "<br>";
    $estacionamento->cadastrar();
}
loadTemplateView('estacionamento');