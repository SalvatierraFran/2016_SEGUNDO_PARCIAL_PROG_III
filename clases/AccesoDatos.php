<?php
class AccesoDatos
{
		//IMPLEMENTAR...
    private static $ObjetoAccesoDatos;
    private $objetoPDO;

    private function __construct()
    {
		//IMPLEMENTAR...
        try {
            $this->objetoPDO = new PDO('mysql:host=localhost;dbname=login_pdo;charset=utf8','root','',array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $this->objetoPDO->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            die();
        }
    }
 
    public function RetornarConsulta($sql)
    { 
		//IMPLEMENTAR...
        return $this->objetoPDO->prepare($sql);
    }
    
     public function RetornarUltimoIdInsertado()
    { 
		//IMPLEMENTAR...
        return $this->objetoPDO->lastInsertId();
    }
 
    public static function dameUnObjetoAcceso()
    { 
		//IMPLEMENTAR...
        if(!isset(self::$ObjetoAccesoDatos)) {
            self::$ObjetoAccesoDatos = new AccesoDatos();
        }
        return self::$ObjetoAccesoDatos;
    }
 
    public function __clone()
    { 
 		//IMPLEMENTAR...
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}