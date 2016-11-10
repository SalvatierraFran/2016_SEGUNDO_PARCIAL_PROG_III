<?php

class Usuario {

//--CONSTRUCTOR
    public function __construct($id = NULL) {
        if ($id !== NULL) {
		//IMPLEMENTAR...
        }
    }
    
    public static function TraerUsuarioLogueado($obj) {
		//IMPLEMENTAR...
    }

    public static function TraerUnUsuarioPorId($id) {
		//IMPLEMENTAR...
    }

    public static function Agregar($obj) {
		//IMPLEMENTAR...
    }

    public function ActualizarFoto() {
		//IMPLEMENTAR...
    }

    public static function Modificar($obj) {
		//IMPLEMENTAR...
    }

    public static function TraerTodosLosUsuarios() {
		//IMPLEMENTAR...
    }

    public static function TraerTodosLosPerfiles() {
		//IMPLEMENTAR...
    }

    public static function Borrar($id) {
		//IMPLEMENTAR...
    }
}