<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('Location: LoginController.php');
    }
require_once '../config/load.php';
loadTemplateView('index');