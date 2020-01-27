<?php
require_once("Router.php");
require_once("api/ComentariosApi.php");

define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

// recurso solicitado
$resource = $_GET["resource"];

// método utilizado
$method = $_SERVER["REQUEST_METHOD"];


// instancia el router
$router = new Router();

// arma la tabla de ruteo
$router->addRoute("comentarios/:ID", "DELETE", "ComentariosApiController", "BorrarComentario");
$router->addRoute("comentarios/:ID", "GET", "ComentariosApiController", "GetComentarios");
$router->addRoute("comentarios", "POST", "ComentariosApiController", "AgregarComentario");

// rutea
$router->route($resource, $method);
