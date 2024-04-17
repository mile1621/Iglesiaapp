<?php
require_once ('../app/config/conexion.php');

class MMiembro 
{
    private $id;
    private $ci;
    private $nombre;
    private $fechaNacimiento;
    private $sexo;
    private $telefono;
    private $miembro;   
  
/*    public  function __construct() {
        $this->stmt = Conexion::getConnection();
        $this-> miembro = array();

    }*/
    public function __construct($id = null,$ci = null,$nombre = null,$fechaNacimiento = null,$sexo = null,$telefono = null) {
        //$this->stmt = Conexion::getConnection();

        if ($id !== null) {
            $this->id=$id;
            $this->ci=$ci;
            $this->nombre=$nombre;
            $this->fechaNacimiento=$fechaNacimiento;
            $this->sexo=$sexo;
            $this->telefono=$telefono;
        }
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getCi()
    {
        return $this->ci;
    }

    public function setCi($ci)
    {
        $this->ci = $ci;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getFechanacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function setFechanacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }
    public function getSexo()
    {
        return $this->sexo;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->nombre = $telefono;
    }

    public function mostrarMiembros()
    {
            try {
                $sql = "SELECT * FROM miembro";
                $stmt = Conexion::getConnection()->prepare($sql);
                $stmt->execute();
                while($row = $stmt-> fetch(PDO::FETCH_ASSOC))
                {
                    $parentezco[]=$row;
                }
                return $parentezco;
        
            } catch (PDOException $th) {
                echo $th -> getMessage();
            }
    }
    
   public  function agregarMiembro($ci,$nombre,$fechanacimiento,$sexo,$telefono)
   {
    try {
        $sql = "INSERT INTO miembro (ci, nombre, fechanacimiento, sexo, telefono) 
        VALUES (:ci, :nombre, :fechanacimiento, :sexo, :telefono)";
        
        $stmt = Conexion::getConnection()->prepare($sql);
        $stmt->bindParam(':ci', $ci);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fechanacimiento', $fechanacimiento);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->execute();
        return true;
    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   }
   public static function MiembroporID($id)
   {
    try {
        $sql = "SELECT * FROM miembro WHERE id= :id" ;
        $stmt = Conexion::getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt -> fetch();
        return $result;
    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   }
   public  function actualizarMiembro($id,$ci,$nombre,$fechanacimiento,$sexo,$telefono)
   {
    try {
        $sql = "UPDATE  miembro SET id= :id, ci= :ci,nombre= :nombre,fechanacimiento = :fechanacimiento,sexo = :sexo,telefono = :telefono WHERE id= :id" ;
        $stmt = Conexion::getConnection()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ci', $ci);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':fechanacimiento', $fechanacimiento);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->execute();
        return true;
    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   }

   public  function deleteMiembro($id)
   {
    try {
        $sql = "DELETE FROM miembro WHERE id = :id";
        $stmt = Conexion::getConnection()->prepare($sql);
        $stmt ->bindParam(':id', $id);
        $stmt->execute();
        return true;
    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   } 

}