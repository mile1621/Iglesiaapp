<?php
require_once ('../app/config/conexion.php');

class MServidor 
{
    private $id_miembro;
    private $id_ministerio;   
    private $anodeIngreso;
    private $estado;
  
/*    public  function __construct() {
        $this->stmt = Conexion::getConnection();
        $this-> miembro = array();

    }*/
    public function __construct() {
    }

    public function getId()
    {
        return $this->id_miembro;
    }
    public function setId($id_miembro)
    {
        $this->id_miembro = $id_miembro;
    }
    public function getIdministerio()
    {
        return $this->id_ministerio;
    }

    public function setIdministerio($id_ministerio)
    {
        $this->id_ministerio = $id_ministerio;
    }
    public function getAnoingreso()
    {
        return $this->anodeIngreso;
    }

    public function setAnoingreso($anodeIngreso)
    {
        $this->anodeIngreso = $anodeIngreso;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }


    public function mostrar($id_ministerio)
    {
            try {
                $sql = "SELECT mini.id AS ministerio_id ,m.id AS miembro_id,m.nombre AS miembro_nombre,s.anodeIngreso,s.estado
                FROM servidor AS s, miembro AS m,ministerio AS mini 
                WHERE s.id_ministerio=:id_ministerio AND s.id_miembro=m.id AND s.id_ministerio=mini.id ";
                $stmt = Conexion::getConnection()->prepare($sql);
                $stmt->bindParam(':id_ministerio', $id_ministerio);
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

    public function registrar($id_miembro,$id_ministerio,$anodeIngreso,$estado)
    {
        try {
            $sql = "INSERT INTO servidor(id_miembro,id_ministerio,anodeIngreso,estado) 
            VALUES (:id_miembro, :id_ministerio, :anodeIngreso,:estado)";
             $stmt = Conexion::getConnection()->prepare($sql);
             $stmt->bindParam(':id_miembro', $id_miembro);
             $stmt->bindParam(':id_ministerio', $id_ministerio);
             $stmt->bindParam(':anodeIngreso', $anodeIngreso);
             $stmt->bindParam(':estado', $estado);
             $stmt->execute();
            return true;
    
        } catch (PDOException $th) {
            echo $th -> getMessage();
        }
        
    }


    public static function obtenerporID($id_miembro,$id_ministerio)
   {
    try {
        $sql = "SELECT * FROM servidor WHERE id_miembro= :id_miembro AND id_ministerio=:id_ministerio" ;
        $stmt = Conexion::getConnection()->prepare($sql);
        $stmt->bindParam(':id_miembro', $id_miembro);
        $stmt->bindParam(':id_ministerio', $id_ministerio);
        $stmt->execute();
        $result = $stmt -> fetch();
        return $result;
    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   }
   public  function actualizar($id_miembro,$id_ministerio,$anodeIngreso,$estado)
   {
    try {
        $sql = "UPDATE  servidor SET id_miembro= :id_miembro,id_ministerio= :id_ministerio, anodeIngreso= :anodeIngreso,estado=:estado 
        WHERE id_miembro= :id_miembro AND id_ministerio=:id_ministerio" ;
        $stmt = Conexion::getConnection()->prepare($sql);
        $stmt->bindParam(':id_miembro', $id_miembro);
        $stmt->bindParam(':id_ministerio', $id_ministerio);
        $stmt->bindParam(':anodeIngreso', $anodeIngreso);
        $stmt->bindParam(':estado', $estado);
        $stmt->execute();
        return true;
    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   }
}