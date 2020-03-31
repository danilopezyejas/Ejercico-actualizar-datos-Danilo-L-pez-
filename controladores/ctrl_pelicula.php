<?php
require "clases/clase_base.php";
require "clases/pelicula.php";
require "clases/paraver.php";
require_once('clases/template.php');
require_once('clases/session.php');
require_once('clases/auth.php');


class ControladorPelicula extends ControladorIndex {

 function listado($params=array()){
 	
 	//Auth::estaLogueado();

	$buscar="";
	$titulo="Listado";
	$mensaje="";
	
	$p=new Pelicula();
	$peliculas=$p->getLista();	
 	
	//Llamar a la vista
 	$tpl = Template::getInstance();
 	$datos = array(
    'peliculas' => $peliculas,
    'buscar' => $buscar,
    'titulo' => $titulo,
    'mensaje' => $mensaje,
    );

	$tpl->mostrar('peliculas_listado',$datos);

}
function buscar($params=array()){
 	
 	Auth::estaLogueado();

	$buscar="";
	if(isset($_POST["buscar"]) && $_POST["buscar"]!="" ){
		$buscar=$_POST["buscar"];
	}	
	$titulo="Listado";
	$mensaje="";
	
	$p=new Pelicula();
	$peliculas=$p->getLista($buscar);	
 	
	//Llamar a la vista
 	$tpl = Template::getInstance();
 	$datos = array(
    'peliculas' => $peliculas,
    'buscar' => $buscar,
    'titulo' => $titulo,
    'mensaje' => $mensaje,
    );

	$tpl->mostrar('peliculas_listado',$datos);

}

function agregar_lista(){
	$mensaje="";
	Session::init();
	
	if(isset($_POST["id_pelicula"])){
		$params=array("id_pelicula"=>$_POST["id_pelicula"],"id_usuario"=>Session::get('usuario_id'));
		$para_ver= new ParaVer($params);
		
		if($para_ver->agregar()){
			$res=1;
			$mensaje="Agregado ok";
		}else{
			$mensaje="Error! No se pudo agregar la película";
			$res=0;
		}

		
	}else{
		$mensaje="error, no se envío película";
		$res=-1;
	}
	
	echo json_encode(array("res"=>$res,"msj"=>$mensaje));
	exit;

}







}
?>