<?php
    session_start();
    if(!isset($_SESSION)){
        header('Location: login.php');
    }
require_once '../config/load.php';
loadTemplateView('estacionamento');