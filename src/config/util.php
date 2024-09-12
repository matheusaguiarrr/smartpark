<?php
    function addSuccessMensage($mensage){
        $_SESSION['message'] = [
            'type' => 'success',
            'message' => $mensage
        ];
    }
    function addWarningMensage($mensage){
        $_SESSION['message'] = [
            'type' => 'warning',
            'message' => $mensage
        ];
    }
    function addErrorMensage($mensage){
        $_SESSION['message'] = [
            'type' => 'danger',
            'message' => $mensage
        ];
    }