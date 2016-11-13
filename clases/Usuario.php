<?php
require_once("AccesoDatos.php");
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
        $consulta = $objetoAccesoDato->RetornarConsulta("select * from usuarios WHERE id=$id");
        $consulta->execute();
        $misUsuarios = $consulta->fetchAll(PDO::FECH_CLASS, "Usuario");
        return $misUsuarios;
    }

    public static function Agregar($obj) {
		//IMPLEMENTAR...
        $conexion = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $conexion->RetornarConsulta("INSERT INTO usuarios(id, nombre, email, password, perfil, foto) VALUES (:id, :nombre, :email, :password, :perfil, :foto)");
        $consulta->bindValue(":id", $obj->_id, PDO::PARAM_INT);
        $consulta->bindValue(":nombre", $obj->_nombre, PDO::PARAM_STR);
        $consulta->bindValue(":email", $obj->_email, PDO::PARAM_STR);
        $consulta->bindValue(":password", $obj->_password, PDO::PARAM_STR);
        $consulta->bindValue(":perfil", $obj->_perfil, PDO::PARAM_STR);
        $consulta->bindValue(":foto", $obj->_foto, PDO::PARAM_STR);

        $sentencia->Execute();
        $id = $conexion->lastInsertId();
        $conexion = null;
        return $id;
    }

    public function ActualizarFoto() {
		//IMPLEMENTAR...
    }

    public static function Modificar($obj) {
		//IMPLEMENTAR...
    }

    public static function TraerTodosLosUsuarios() {
		//IMPLEMENTAR...
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("select * from usuarios");
        $consulta->execute();
        $misUsuarios = $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
        return $misUsuarios;
    }

    public static function TraerTodosLosPerfiles() {
		//IMPLEMENTAR...
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("select distinct perfil from usuarios");
        $consulta->execute();
        $misUsuarios = $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
        return $misUsuarios;
    }

    public static function Borrar($id) {
		//IMPLEMENTAR...
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM usuarios WHERE id=:id");
        $consulta->bindValue(":id", $id, PDO::PARAM_INT);
        $consulta->Execute();
        $consulta=null;
    }
}