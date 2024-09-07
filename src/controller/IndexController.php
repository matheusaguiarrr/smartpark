<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: LoginController.php');
    }
require_once '../config/load.php';
require_once '../model/Estacionamento.php';
$estacionamento = Estacionamento::listar($_SESSION['id']);
if($estacionamento){
    loadTemplateView('index', ['estacionamento' => $estacionamento]);
}
else {
    loadTemplateView('index');
}