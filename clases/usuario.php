<?php
class Usuario extends ClaseBase {
	public $id=0;
    public $nombre = '';
	public $apellido = '';
    public $ci = '';
	public $edad = 0;
    public $email='';
    public $foto='';
    //Contructor que recibe un array
	public function __construct($obj=NULL) {
        //$this->db=DB::conexion();
        if(isset($obj)){
            foreach ($obj as $key => $value) {
                $this->$key=$value;
            }
        }
        $tabla="usuarios";
        parent::__construct($tabla);

    }

    public function getid() {
        return $this->id;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getCI() {
        return $this->ci;
    }
    public function getEdad() {
        return $this->edad;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto=$foto;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email){
        $this->email=$email;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setCI($ci){
        $this->ci=$ci;
    }
    public function setEdad($edad){
        $this->edad=$edad;
    }

    public function getBusqueda($buscar){
        $usuarios=array();
        $stmt = $this->getDB()->prepare(
            "SELECT * FROM usuarios
            WHERE nombre like ? " );
        // Le agrego % para busque los que empiezan con la letra o terminan
        $buscar= '%'.$buscar.'%';
        $stmt->bind_param( "s",$buscar);
        $stmt->execute();
        $resultado = $stmt->get_result();
        while ($fila=$resultado->fetch_object()) {
            //$fila["nombre"] fetch_array
            //$fila->nombre fetch_object
            $persona= new Usuario($fila);
                $usuarios[]=$persona;
        }
        return $usuarios;
    }


    public function agregar(){

        $nombre=$this->getNombre();
        $ape=$this->getApellido();
        $edad=$this->getEdad();
        $ci=$this->getCI();
        $foto=$this->getFoto();
        $password = sha1("123456");
        $email=$this->getEmail();

        $stmt = $this->getDB()->prepare(
            "INSERT INTO usuarios
        (nombre, apellido,edad, ci, email,pass,foto)
           VALUES (?,?,?,?,?,?,?)" );

        $stmt->bind_param("ssissss",$nombre,$ape,$edad,$ci,$email,$password,$foto);

        return $stmt->execute();

    }

		public function editar(){

				$idUsuario=Session::get('usuario_id');
        $nombre=$this->getNombre();
        $ape=$this->getApellido();
        $edad=$this->getEdad();
        $ci=$this->getCI();
        $foto=$this->getFoto();
        $password = sha1("123456");
        $email=$this->getEmail();
// UPDATE `usuarios` SET `edad` = '30', `ci` = '987654321' WHERE `usuarios`.`id` = 27;
        $stmt = $this->getDB()->prepare(
            "UPDATE usuarios
						SET nombre = ?,
								apellido = ?,
								edad = ?,
								ci = ?,
								foto = ?,
								email = ?,
								pass = ?
								WHERE id=?");

         $stmt->bind_param("ssissssi",$nombre,$ape,$edad,$ci,$foto,$email,$password,$idUsuario);

				Session::destroy();
				Session::init();
				Session::set('usuario_logueado', true);
				Session::set('usuario_id', $idUsuario);
				Session::set('usuario_nombre', $nombre);
				Session::set('usuario_apellido', $ape);
				Session::set('usuario_email', $email);
				Session::set('usuario_foto', $foto);
				Session::set('usuario_edad', $edad);
				Session::set('usuario_ci', $ci);
				Session::set('usuario_pswd', $password);

        return $stmt->execute();

    }

    public function login($email,$pass){
        $stmt = $this->getDB()->prepare( "SELECT * from  usuarios WHERE email=? AND pass=?" );
        $stmt->bind_param("ss",$email,$pass);

        //SELECT * from  usuarios WHERE email=$email AND pass=$pass


        $stmt->execute();
        $resultado = $stmt->get_result();
        if($resultado->num_rows<1){
            return false;
        }
        $res=$resultado->fetch_object();

        Session::init();
        Session::set('usuario_logueado', true);
        Session::set('usuario_id', $res->id);
        Session::set('usuario_nombre', $res->nombre);
				Session::set('usuario_apellido', $res->apellido);
        Session::set('usuario_email', $res->email);
				Session::set('usuario_foto', $res->foto);
				Session::set('usuario_edad', $res->edad);
				Session::set('usuario_ci', $res->ci);
				Session::set('usuario_pswd', $res->pass);

        return true;
    }

   public function logout(){
        Session::init();
        Session::destroy();
   }
}
?>
