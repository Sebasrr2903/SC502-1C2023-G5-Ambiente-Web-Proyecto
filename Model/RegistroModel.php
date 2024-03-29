<?php
require_once '../Config/conexion.php';
class RegistroModel extends conexion
{
    protected static $cnx;

    public function __construct(){}

    public static function getConexion(){
        self::$cnx=conexion::conectar();
    }
    public static function desconectar(){
        self::$cnx=null;
    }
    public static function mostrarID(){
        $query="SELECT * FROM Tipo_Identificacion";
        try{
            self::getConexion();
            $resultado=self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            self::desconectar();
            $error="Error ".$e->getCode().": ".$e->getMessage();
            return $error; 
        }
    }
    public static function mostrarRol(){
        $query="SELECT * FROM roles";
        try{
            self::getConexion();
            $resultado=self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            self::desconectar();
            $error="Error ".$e->getCode().": ".$e->getMessage();
            return $error; 
        }
    }
    public static function mostrarProvincia(){
        $query="SELECT * FROM Provincias";
        try{
            self::getConexion();
            $resultado=self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            self::desconectar();
            $error="Error ".$e->getCode().": ".$e->getMessage();
            return $error; 
        }
    }
    public static function mostrarCanton($numero){
        $query="SELECT * FROM Cantones WHERE Provincia_ID=:id";
        $id=$numero;
        try{
            self::getConexion();
            $resultado=self::$cnx->prepare($query);
            $resultado->bindParam(":id",$id,PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            self::desconectar();
            $error="Error ".$e->getCode().": ".$e->getMessage();
            return $error; 
        }
    }
    public static function mostrarDistrito($id){
        $query="SELECT * FROM Distritos WHERE Canton_ID=:numero";
        $numero=$id;
        try{
            self::getConexion();
            $resultado=self::$cnx->prepare($query);
            $resultado->bindParam(":numero",$numero,PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        }catch (PDOException $e){
            self::desconectar();
            $error="Error ".$e->getCode().": ".$e->getMessage();
            return $error; 
        }
    }
}
?>