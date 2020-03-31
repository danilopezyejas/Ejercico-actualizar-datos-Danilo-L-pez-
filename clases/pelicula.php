<?php
class Pelicula extends ClaseBase {
	public $id=0;
    private $anio;
    private $titulo;
    private $poster;
    //Contructor que recibe un array
	public function __construct($obj=NULL) {
        //$this->db=DB::conexion();
        if(isset($obj)){
            foreach ($obj as $key => $value) {
                $this->$key=$value;
            }    
        }
        $tabla="peliculas";
        parent::__construct($tabla);

    }
   
    public function getid() {
        return $this->id;
    }
    public function setAnio($anio){
        $this->anio = $anio;
    }
    public function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    public function setPoster($poster){
        $this->poster = $poster;
    }

    public function getAnio(){
        return $this->anio;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getPoster(){
        return $this->poster;
    }

    
    public function getLista($texto_busqueda="pulp"){

        $texto_busqueda=urlencode($texto_busqueda);

        $client = new GuzzleHttp\Client();
       
        $anio_busqueda="";
        $tipo_busqueda="";
        $response = $client->get('http://www.omdbapi.com/',['query'=>['s'=>$texto_busqueda,'y'=>$anio_busqueda,'type'=>$tipo_busqueda,'apikey'=>'169e719d']]);
        
        $json_response=json_decode($response->getBody(), true);
        $films=$json_response["Search"];
        $peliculas=array();
        foreach ($films as $key => $value) {
            $params=array('anio'=>$value["Year"],'titulo'=>$value["Title"],'poster'=>$value["Poster"],'id'=>$value["imdbID"]);
            $pelicula= new Pelicula($params);
            $peliculas[]=$pelicula;
        }                        
        return $peliculas;
    }

    

    
}
?>