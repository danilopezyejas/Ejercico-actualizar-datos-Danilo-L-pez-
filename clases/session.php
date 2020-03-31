<?php
class Session
{
    public static function init(){
        if (session_id() == '') {
            session_start();
        }
    }

    //Sin sesion creada
    //session_start(); -> generar un id 
    //session_id -> Si tengo un id cargado-> llama session_start
    //           -> Si no tengo id cargado, crea un id   



    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }
    public static function get($key){
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }
    public static function destroy(){
        session_destroy();
    }
}