<?php
require_once ('../app/config/conexion.php');

class MParentezco
{
    //private $parentezco;
    //private $stmt;
    private $id;
    private $descripcion;
  
    public  function __construct() {

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
    public function obtener()
   {
    try {
        $sql = "SELECT * FROM parentezco";
        $resul = Conexion::getConnection()->query($sql);
        while($row = $resul-> fetch(PDO::FETCH_ASSOC))
        {
            $parentezco[]=$row;
        }
        return $parentezco;

    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   }

}