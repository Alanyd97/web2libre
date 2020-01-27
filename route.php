<?php

require_once "config/ConfigApp.php";
require_once "producto/controller.php";
require_once "usuario/controller.php";
require_once "login/controller.php";
require_once "categoria/controller.php";

$action = $_GET["action"];

$controller_ = new LoginController();

function parseURL($url)
{
  $urlExploded = explode('/', $url);
  $arrayReturn[ConfigApp::$ACTION] = $urlExploded[0];
  $arrayReturn[ConfigApp::$PARAMS] = isset($urlExploded[1]) ? array_slice($urlExploded,1) : null;
  //retortna un arreglo de 2 posiciones [accion][parametros]
  return $arrayReturn;  
}

if(isset($_GET['action'])){
    //parseurl analiza la url seteada
     $urlData = parseURL($_GET['action']);
     $action = $urlData[ConfigApp::$ACTION]; //home
     if(array_key_exists($action,ConfigApp::$ACTIONS)){
         $params = $urlData[ConfigApp::$PARAMS];
         $action = explode('#',ConfigApp::$ACTIONS[$action]); 
         $controller = new $action[0]();
         $metodo = $action[1];
         if(isset($params) &&  $params != null){
             echo $controller->$metodo($params);
         }
         else{
             echo $controller->$metodo();
         }
     }else{
         echo "error 404 pagina no encontrada";
     }
 }

?>