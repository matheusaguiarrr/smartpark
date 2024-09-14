<?php
date_default_timezone_set('America/Sao_Paulo');
define('TEMPLATES_PATH', realpath(dirname(__FILE__) . "/../view/template"));
define('VIEWS_PATH', realpath(dirname(__FILE__) . "/../view"));
function loadView($viewName, $params = []){
    if(count($params) > 0){
        foreach($params as $key => $value){
            //Criando uma variável dinâmica, com nome e valor passados no array
            ${$key} = $value;
        }

    }
    require_once(VIEWS_PATH . "/{$viewName}.php");
}
function loadTemplateView($viewName, $params = []){
    if(count($params) > 0){
        foreach($params as $key => $value){
            ${$key} = $value;
        }
    }
    require_once(TEMPLATES_PATH . "/header.php");
    require_once(TEMPLATES_PATH . "/menu.php");
    require_once(VIEWS_PATH . "/{$viewName}.php");
}