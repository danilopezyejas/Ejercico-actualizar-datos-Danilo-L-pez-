<?php
require "db/db.php";
require 'vendor/autoload.php';
require "controladores/ctrl_index.php";
require_once('clases/template.php');
require_once('clases/session.php');
require_once('clases/auth.php');

$controlIndex=new ControladorIndex();

$tpl = Template::getInstance();
$tpl->asignar('url_base',"http://localhost/tip/framework/");
$tpl->asignar('url_logout',$controlIndex->getUrl("usuario","logout"));
$tpl->asignar('proyecto',"Framework");

//Cargamos controladores y acciones

if(isset($_GET['url'])){
	// usuario/login/
	$query = $_GET['url'];
	$request = explode('/', $query);
	// "usuario/login/"  -> ["usuario","login"]
	$controller = (!empty($request[0])) ? $request[0] : 'usuario';
	$action = (!empty($request[1])) ? $request[1] : 'listado';
	$params=array();
	for ($i=2; $i <count($request) ; $i++) {
		$params[]=$request[$i];
	}
}else{
	$controller="usuario";
	$action="listado";
	$params=array();
}
$tpl->asignar('usuario',"");
$tpl->asignar('foto',"");

if($action!='login'){
	Auth::estaLogueado();
	$tpl->asignar('usuario',Session::get("usuario_nombre"));
	$tpl->asignar('foto',Session::get("usuario_foto"));
}

$tpl->asignar('controller',$controller);

$controllerObj=$controlIndex->cargarControlador($controller);
//require_once(ctrl_usuario.php)

$controlIndex->ejecutarAccion($controllerObj,$action,$params);
//login();


?>
