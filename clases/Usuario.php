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
        $respuesta = NULL;
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios WHERE email = :correo AND password = :pass"); 
        $consulta->bindParam(":correo", $obj->correo, PDO::PARAM_STR);
        $consulta->bindParam(":pass", $obj->pass, PDO::PARAM_STR);
        $consulta->execute();         
        $datoUsser = $consulta->fetch(PDO::FETCH_ASSOC);
        if ($consulta->rowCount() == 1) 
        {
           $respuesta = $datoUsser;
        }
        return $respuesta;
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
        $consulta = $conexion->RetornarConsulta("INSERT INTO usuarios(nombre, email, password, perfil, foto) VALUES (:nombre, :email, :password, :perfil, :foto)");
        $consulta->bindValue(":nombre", $obj->_nombre, PDO::PARAM_STR);
        $consulta->bindValue(":email", $obj->_email, PDO::PARAM_STR);
        $consulta->bindValue(":password", $obj->_password, PDO::PARAM_STR);
        $consulta->bindValue(":perfil", $obj->_perfil, PDO::PARAM_STR);
        $consulta->bindValue(":foto", $obj->_foto, PDO::PARAM_STR);

        $consulta->Execute();
        $retorno = $conexion->lastInsertId();
        $conexion = null;
        return $retorno;
    }

    public function ActualizarFoto() {
		//IMPLEMENTAR...
    }

    public static function Modificar($obj) {
		//IMPLEMENTAR...
        $conexion = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $conexion->RetornarConsulta("UPDATE usuarios SET nombre=:nombre, email=:email, password=:password, perfil=:perfil, foto=:foto WHERE id=:id");
        $consulta->bindValue(":id", $this->_id, PDO::PARAM_INT);
        $consulta->bindValue(":nombre", $this->_nombre, PDO::PARAM_STR);
        $consulta->bindValue(":email", $this->_email, PDO::PARAM_STR);
        $consulta->bindValue(":password", $this->_password, PDO::PARAM_STR);
        $consulta->bindValue(":perfil", $this->_perfil, PDO::PARAM_STR);
        $consulta->bindValue(":foto", $this->_foto, PDO::PARAM_STR);

        $retorno = $consulta->Execute();
        $conexion = null;

        return $retorno;
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