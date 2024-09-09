<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: LoginController.php');
    }
require_once '../config/load.php';
require_once '../model/Vaga.php';
require_once '../model/Estacionamento.php';
$estacionamento = Estacionamento::listar($_SESSION['id']);
$vagas = Vaga::listar($estacionamento->getId());
if(isset($_POST['cadastrar'])){
    $vaga = new Vaga($_POST['estacionamento'], null, $_POST['identificador']);
    $retorno = $vaga->cadastrar($estacionamento);
    if(!$retorno == false){
        header('Location: VagaController.php');
    }
    else {
        echo "Limite de vagas atingido!";
    }
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
    header('Location: VagaController.php');
}
if(isset($_POST['deletar'])){
    $vaga = new Vaga($_POST['estacionamento'], $_POST['id'], null);
    $vaga->deletar();
    header('Location: VagaController.php');
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