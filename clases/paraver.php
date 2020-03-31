<?php
class ParaVer extends ClaseBase {
	public $id_usuario=0;
    private $id_pelicula;
    //Contructor que recibe un array
	public function __construct($obj=NULL) {
        //$this->db=DB::conexion();
        if(isset($obj)){
            foreach ($obj as $key => $value) {
                $this->$key=$value;
            }    
        }
        $tabla="para_ver";
        parent::__construct($tabla);

    }

    public function agregar(){
        
        $id_usuario=$this->getIdUsuario();
        $id_pelicula=$this->getIdPelicula();

        $stmt = $this->getDB()->prepare( 
            "INSERT INTO para_ver 
        (id_usuario, id_pelicula) 
           VALUES (?,?)" );
        $stmt->bind_param("is",$id_usuario,
            $id_pelicula);
        return $stmt->execute();
    
    }
   
    public function getIdUsuario() {
        return $this->id_usuario;
    }
    public function getIdPelicula() {
        return $this->id_pelicula;
    }
    
   
    

    

    
}
?>