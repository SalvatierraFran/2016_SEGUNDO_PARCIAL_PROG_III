<?php
require_once("AccesoDatos.php");
class Usuario {

    public $id;
    public $nombre;
    public $email;
    public $password;
    public $perfil;
    public $foto;

    //Propiedades
    /*public function getId()
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
    }*/

//--CONSTRUCTOR
    public function __construct($id = NULL) {
        if ($id !== NULL) {
		//IMPLEMENTAR...
            $unUser = Usuario::TraerUnUsuarioPorId($id);
            $this->id = $unUser->id;
            $this->nombre = $unUser->nombre;
            $this->email = $unUser->email;
            $this->password = $unUser->password;
            $this->perfil = $unUser->perfil;
            $this->foto = $unUser->foto;
        }
    }
    
    public static function TraerUsuarioLogueado($obj) {
		//IMPLEMENTAR...
        //$respuesta = NULL;
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios WHERE email = :correo AND password = :pass"); 
        $consulta->bindParam(":correo", $obj->correo, PDO::PARAM_STR);
        $consulta->bindParam(":pass", $obj->pass, PDO::PARAM_STR);
        $consulta->execute();   

        if($consulta->rowCount() != 1)
            return false;
        return $consulta->fetchObject('Usuario');

        //$datoUsser = $consulta->fetch(PDO::FETCH_ASSOC);
        /*if ($consulta->rowCount() == 1) 
        {
           $respuesta = $datoUsser;
        }
        return $respuesta;*/
    }

    public static function TraerUnUsuarioPorId($id) {
		//IMPLEMENTAR...
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios WHERE id=$id");
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);
        $consulta->execute();
        if($consulta->rowCount() != 1){
            return false;
        }
        return $consulta->fetchObject('Usuario');
    }

    public static function Agregar($obj) {
		//IMPLEMENTAR...
        $conexion = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $conexion->RetornarConsulta("INSERT INTO usuarios(nombre, email, password, perfil, foto) VALUES (:nombre, :email, :password, :perfil, :foto)");
        $consulta->bindValue(":nombre", $obj->nombre, PDO::PARAM_STR);
        $consulta->bindValue(":email", $obj->email, PDO::PARAM_STR);
        $consulta->bindValue(":password", $obj->password, PDO::PARAM_STR);
        $consulta->bindValue(":perfil", $obj->perfil, PDO::PARAM_STR);
        $consulta->bindValue(":foto", $obj->foto, PDO::PARAM_STR);

        $consulta->Execute();
        //$retorno = $conexion->lastInsertId();
        //$conexion = null;
        return TRUE;
    }

    public function ActualizarFoto() {
		//IMPLEMENTAR...
    }

    public static function Modificar($obj) {
		//IMPLEMENTAR...
        $conexion = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $conexion->RetornarConsulta("UPDATE usuarios SET nombre=:nombre, email=:email, perfil=:perfil, foto=:foto WHERE (id=:id)");
        $consulta->bindValue(":id", $obj->id, PDO::PARAM_INT);
        $consulta->bindValue(":nombre", $obj->nombre, PDO::PARAM_STR);
        $consulta->bindValue(":email", $obj->email, PDO::PARAM_STR);
        $consulta->bindValue(":password", $obj->password, PDO::PARAM_STR);
        $consulta->bindValue(":perfil", $obj->perfil, PDO::PARAM_STR);
        $consulta->bindValue(":foto", $obj->foto, PDO::PARAM_STR);

        $consulta->Execute();

        return TRUE;
    }

    public static function TraerTodosLosUsuarios() {
		//IMPLEMENTAR...
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM usuarios");
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Usuario');
        $unArray = array();
        foreach ($consulta as $value) {
            # code...
            array_push($unArray, $value);
        }
        return $unArray;
        /*$misUsuarios = $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
        return $misUsuarios;*/
    }

    public static function TraerTodosLosPerfiles() {
		//IMPLEMENTAR...
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta = $objetoAccesoDato->RetornarConsulta("SELECT DISTINCT perfil FROM usuarios");
        $consulta->execute();
        //$misUsuarios = $consulta->fetchAll(PDO::FETCH_CLASS, "Usuario");
        $unArray = array();
        foreach ($consulta as $value) {
            # code...
            array_push($unArray, $value[0]);
        }
        return $unArray;

        //return array("administrador", "usuario", "invitado");
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