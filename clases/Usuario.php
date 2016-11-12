<?php

class Usuario {

    private $_id;
    private $_nombre;
    private $_email;
    private $_password;
    private $_perfil;
    private $_foto;

    //Propiedades
    public function getId()
    {
        return $this->_id;
    }
    public function getUser()
    {
        return $this->_nombre;
    }
    public function getMail()
    {
         return $this->_email;
    }
    public function getPass()
    {
        return $this->_password;
    }
    public function getPerfil()
    {
        return $this->_perfil;
    }
    public function getFoto()
    {
        return $this->_foto;
    }

//--CONSTRUCTOR
    public function __construct($id = NULL) {
        if ($id !== NULL) {
		//IMPLEMENTAR...
            $this->_id = $id;
        }
    }
    
    public static function TraerUsuarioLogueado($obj) {
		//IMPLEMENTAR...
        return $this->TraerUnUsuarioPorID($obj->_id);
    }

    public static function TraerUnUsuarioPorId($id) {
		//IMPLEMENTAR...
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("select * from 'usuarios' WHERE 'id'=$id");
        $consulta->execute();
        $arrUsuarios = $consulta->fetchAll(PDO::FECH_CLASS, "Usuario");
        return $arrUsuarios;
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