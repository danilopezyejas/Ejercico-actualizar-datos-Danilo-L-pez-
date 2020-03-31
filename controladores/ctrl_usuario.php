<?php
require "clases/clase_base.php";
require "clases/usuario.php";
require "clases/utils.php";
require_once('clases/template.php');
require_once('clases/session.php');
require_once('clases/auth.php');


class ControladorUsuario extends ControladorIndex {

 function listado($params=array()){

 	//session_start();
	//echo $_SESSION["email"];

 	Auth::estaLogueado();

	$buscar="";
	$titulo="Listado";
	$mensaje="";
	if(!empty($params)){
		if($params[0]=="borrar"){
			$usuario=new Usuario();
			//$params= ['borrar',123]
			$idABorrar=$params[1];
	 		if($usuario->borrar($idABorrar)){
	 			//Redirigir al listado
	 			//header('Location: index.php');exit;
	 			$this->redirect("usuario","listado");
	 		}else{
	 			//Mostrar error
	 			$usr=$usuario->obtenerPorId($idABorrar);
	 			//$mensaje="Error!! No se pudo borrar el usuario  <b>".$usr->getNombre()." ".$usr->getApellido()."</b>";
	 			$mensaje="ERROR. No existe el usuario";
	 			$usuarios=$usuario->getListado();
	 		}
		}else{
	 		$usuario=new Usuario();
			$usuarios=$usuario->getListado();
	 	}
	}else{
 		$usuario=new Usuario();
		$usuarios=$usuario->getListado();
 	}
	//Llamar a la vista
 	$tpl = Template::getInstance();
 	$datos = array(
    'usuarios' => $usuarios,
    'buscar' => $buscar,
    'titulo' => $titulo,
    'mensaje' => $mensaje,
    );
 	$tpl->asignar('usuario_nuevo',$this->getUrl("usuario","nuevo"));
	$tpl->mostrar('usuarios_listado',$datos);

}
function buscar($params=array()){

 	Auth::estaLogueado();

	$buscar="";
	$titulo="Listado";
	$mensaje="";
	$usuarios=array();
	if(isset($_POST["buscar"]) && $_POST["buscar"]!="" ){
			$titulo="Buscando..";
	 		$usuario=new Usuario();
	 		$buscar=$_POST["buscar"];
			$usuarios=$usuario->getBusqueda($buscar);
	}else{
		$usuario=new Usuario();
		$usuarios=$usuario->getListado();
	}

	//Llamar a la vista
	//require_once("vistas/usuarios_listado.php");

 	$tpl = Template::getInstance();
 	$datos = array(
    'usuarios' => $usuarios,
    'buscar' => $buscar,
    'titulo' => $titulo,
    'mensaje' => $mensaje,
    );


	$tpl->asignar('usuario_nuevo',$this->getUrl("usuario","nuevo"));
	$tpl->mostrar('usuarios_listado',$datos);

}

function nuevo(){
	$mensaje="";
	if(isset($_POST["nombre"])){
		$fotoValida=false;
		$rutaFoto="";
		if(isset($_FILES['foto'])){
			$utils=new Utils();
			$chequeoFoto=$utils->uploadImagen($_FILES['foto']);
			$fotoValida=$chequeoFoto["res"];
			$mensaje=$chequeoFoto["error"];
			$rutaFoto=$chequeoFoto["ruta"];
		}
		if($fotoValida){
			$usr= new Usuario();
			$usr->setNombre($_POST["nombre"]);
			$usr->setApellido($_POST["apellido"]);
			$usr->setCI($_POST["ci"]);
			$usr->setEdad($_POST["edad"]);
			$usr->setEmail($_POST["email"]);
			$usr->setFoto($rutaFoto);
			if($usr->agregar()){
				$this->redirect("usuario","listado");
				exit;
			}else{
				$mensaje="Error! No se pudo agregar el usuario";
			}
		}
	}
	$tpl = Template::getInstance();
	$tpl->asignar('titulo',"Nuevo Usuario");
	$tpl->asignar('buscar',"");
	$tpl->asignar('mensaje',$mensaje);
	$tpl->mostrar('usuarios_nuevo',array());

}
function login(){

	$mensaje="";
	session_start();

	if(isset($_POST["email"])){
		$usr= new Usuario();

		$email=$_POST["email"];
		$pass=sha1($_POST["password"]);

		if($usr->login($email,$pass)){

							//controlador /accion
			$this->redirect("usuario","listado");


			exit;
		}else{
			$mensaje="Error! No se pudo agregar el usuario";
		}


	}



	$tpl = Template::getInstance();
	$tpl->asignar('titulo',"Nuevo Usuario");
	//$titulo="Nuevo Usuario"
	$tpl->asignar('loginUrl',"");
	$tpl->asignar('buscar',"");
	$tpl->asignar('mensaje',$mensaje);
	$tpl->mostrar('usuarios_login',array());
	// mostrar el archivo usuarios_login.tpl



}
function logout(){
	$usr= new Usuario();
	$usr->logout();
	$this->redirect("usuario","login");
}



function favoritos(){
	$usuario=new Usuario();
	$usuarios=$usuario->getListado();
	echo json_encode($usuarios);
}

function editar()
{
  $mensaje="";
  if(isset($_POST["nombre"])){
    $fotoValida=false;
    $rutaFoto="";
    if(isset($_FILES['foto'])){
      $utils=new Utils();
      $chequeoFoto=$utils->uploadImagen($_FILES['foto']);
      $fotoValida=$chequeoFoto["res"];
      $mensaje=$chequeoFoto["error"];
      $rutaFoto=$chequeoFoto["ruta"];
    }
    if (Session::get('usuario_foto') != NULL) {
      $fotoValida=true;
      $rutaFoto=Session::get('usuario_foto');
    }
    if($fotoValida){
      $usr= new Usuario();
      $usr->setNombre($_POST["nombre"]);
      $usr->setApellido($_POST["apellido"]);
      $usr->setCI($_POST["ci"]);
      $usr->setEdad($_POST["edad"]);
      $usr->setEmail($_POST["email"]);
      $usr->setFoto($rutaFoto);
      if($usr->editar()){
        $this->redirect("usuario","listado");
        exit;
      }else{
        $mensaje="Error! No se pudo agregar el usuario";
      }
    }
  }
// Actualizo los datos de la sesion
  $nombre = Session::get("usuario_nombre");
  $apellido = Session::get("usuario_apellido");
  $email = Session::get("usuario_email");
  $pass = Session::get("usuario_pswd");
  $edad = Session::get("usuario_edad");
  $ci = Session::get("usuario_ci");
  $foto = Session::get('usuario_foto');

  $tpl = Template::getInstance();

  $datos = array(
    'nombre' => $nombre,
    'apellido' => $apellido,
    'email' => $email,
    'pass' => $pass,
    'edad' => $edad,
    'ci' => $ci,
    'foto' => $foto,
    );

  $tpl->asignar('titulo',"Editar Usuario");
  //$titulo="Nuevo Usuario"
  $tpl->asignar('loginUrl',"");
  $tpl->asignar('buscar',"");
  $tpl->asignar('mensaje',$mensaje);
  $tpl->mostrar('usuario_editar',$datos);
}

}
?>
