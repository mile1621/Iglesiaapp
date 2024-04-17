<?php
require_once ('../app/config/conexion.php');

class MMinisterio 
{
    private $id;
    private $descripcion;   
  
/*    public  function __construct() {
        $this->stmt = Conexion::getConnection();
        $this-> miembro = array();

    }*/
    public function __construct() {
        //$this->stmt = Conexion::getConnection();

    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }


    public function mostrarMinisterios()
    {
            try {
                $sql = "SELECT * FROM ministerio";
                $stmt = Conexion::getConnection()->prepare($sql);
                $stmt->execute();
                while($row = $stmt-> fetch(PDO::FETCH_ASSOC))
                {
                    $ministerio[]=$row;
                }
                return $ministerio;
        
            } catch (PDOException $th) {
                echo $th -> getMessage();
            }
    }
    public  function agregarMinisterio($descripcion)
   {
    try {
        $sql = "INSERT INTO ministerio (descripcion) 
        VALUES (:descripcion)";
        
        $stmt = Conexion::getConnection()->prepare($sql);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->execute();
        return true;
    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   }
   public static function obtenerporID($id)
   {
    try {
        $sql = "SELECT * FROM ministerio WHERE id= :id" ;
        $stmt = Conexion::getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt -> fetch();
        return $result;
    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   }
   public  function actualizar($id,$descripcion)
   {
    try {
        $sql = "UPDATE  ministerio SET id= :id, descripcion= :descripcion WHERE id= :id" ;
        $stmt = Conexion::getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->execute();
        return true;
    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   }

   public  function delete($id)
   {
    try {
        $sql = "DELETE FROM ministerio WHERE id = :id";
        $stmt = Conexion::getConnection()->prepare($sql);
        $stmt ->bindParam(':id', $id);
        $stmt->execute();
        return true;
    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   } 

    
   

}