<?php
require_once ('../app/config/conexion.php');

class MRelacionesF
{
    
    private $id_miembro;
    private $id_familiar;
    private $id_parentezco;
    public  function __construct() {
 
    }
    public function getIdMiembro()
    {
        return $this->id_miembro;
    }
    public function setIdM($id_miembro)
    {
        $this->id_miembro = $id_miembro;
    }
    public function getIdFamiliar()
    {
        return $this->id_familiar;
    }

    public function setFamiliar($id_familiar)
    {
        $this->id_familiar = $id_familiar;
    }
    public function getIdParentezco()
    {
        return $this->id_parentezco;
    }

    public function setidPrentezco($id_parentezco)
    {
        $this->id_parentezco = $id_parentezco;
    }
    public function mostrarFamiliares()
    {
    try {
        $sql = "SELECT m.id as miembro_id,m.nombre AS nombre_miembro,f.id as familiar_id,f.nombre AS nombre_familiar,p.descripcion as parentezco
        FROM miembro AS m
        JOIN miembro AS f ON f.id IN (SELECT id_familiar FROM familiar WHERE id_miembro = m.id)
        JOIN familiar AS fam ON fam.id_miembro = m.id AND fam.id_familiar = f.id
        JOIN parentezco AS p ON p.id=fam.id_parentezco;";
        $resul = Conexion::getConnection()->query($sql);
        while($row = $resul-> fetch(PDO::FETCH_ASSOC))
        {
            $familia[]=$row;
        }
        return $familia;

    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   } 
    
   public function Registrar($id_miembro,$id_familiar,$id_parentezco){
    try {
        if ($id_miembro != $id_familiar){
        $sql = "INSERT INTO familiar(id_miembro,id_familiar,id_parentezco) 
        VALUES (:id_miembro, :id_familiar, :id_parentezco)";
         $stmt = Conexion::getConnection()->prepare($sql);
         $stmt->bindParam(':id_miembro', $id_miembro);
         $stmt->bindParam(':id_familiar', $id_familiar);
         $stmt->bindParam(':id_parentezco', $id_parentezco);
         $stmt->execute();
        }else{
            echo ("Error de selección, un miembro no puede relacionarse con si mismo");
        }

    } catch (PDOException $th) {
        echo $th -> getMessage();
    }
   }
    
    public function ObtenerFamilia($id){
        try {
            $sql = "SELECT m.id as miembro_id,m.nombre AS nombre_miembro,f.id as familiar_id,f.nombre AS nombre_familiar,p.descripcion as parentezco
            FROM miembro AS m
            JOIN miembro AS f ON f.id IN (SELECT id_familiar FROM familiar WHERE id_miembro = m.id)
            JOIN familiar AS fam ON fam.id_miembro = :id AND fam.id_familiar = f.id
            JOIN parentezco AS p ON p.id=fam.id_parentezco;";
            $resul = Conexion::getConnection()->prepare($sql);
            $resul->bindParam(':id', $id);
            $resul->execute();
          //  $this->familia = [];
            while($row = $resul-> fetch(PDO::FETCH_ASSOC))
            {
                $familia[]=$row;
            }
            return $familia;
        } catch (PDOException $th) {
            echo $th -> getMessage();
        }
       }
    public Function EliminarR($id_miembro,$id_familiar){
        try {
            $sql = "DELETE FROM familiar WHERE id_miembro = :id_miembro and id_familiar= :id_familiar";
            $stmt = Conexion::getConnection()->prepare($sql);
            $stmt ->bindParam(':id_miembro', $id_miembro);
            $stmt ->bindParam(':id_familiar', $id_familiar);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo $th -> getMessage();
        }
    }
}