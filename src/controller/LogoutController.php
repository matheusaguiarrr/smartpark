<?php
    if(isset($_POST)){
        session_start();
        session_destroy();
        header('Location: LoginController.php');
    }