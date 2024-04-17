<?php 

declare(strict_types=1);

require_once ('../app/models/MMiembro.php'); 
require_once ('../app/models/MRelacionesF.php');
require_once ('../app/models/MParentezco.php');
require_once ('../app/views/VRelacionesF.php'); 

class CRelacionesF{
    
    private VRelacionesF $VRelacionesF;
    private MRelacionesF $MRelacionesF;
    private MParentezco $MParentezco;
    private MMiembro $MMiembro;
   // private MCargo $modeloCargo;

    public function __construct()
    {
        $this-> VRelacionesF = new VRelacionesF();
        $this->MRelacionesF = new MRelacionesF(); 
        $this->MParentezco = new MParentezco();
        $this->MMiembro = new MMiembro();
    }

    public function MostrarFamilia()
    {
        $familias = $this->MRelacionesF-> mostrarFamiliares();
        $miembros = $this->MMiembro-> mostrarMiembros();
        $parentezco = $this->MParentezco->obtener();
        $this->VRelacionesF->actualizar($miembros,$familias,$parentezco);     
    }

    public function ObtenerFamilia($id){
        $familiares = $this->MRelacionesF->ObtenerFamilia($id);
        $miembros = $this->MMiembro-> mostrarMiembros();
        $parentezco = $this->MParentezco->obtener();
        $this->VRelacionesF->actualizar($miembros,$familiares,$parentezco); 
    }
    public function RegistrarFamilia($id_miembro,$id_familiar,$id_parentezco){
          $this->MRelacionesF->Registrar($id_miembro,$id_familiar,$id_parentezco);
          $familias = $this->MRelacionesF-> mostrarFamiliares();
          $miembros = $this->MMiembro-> mostrarMiembros();
          $parentezco = $this->MParentezco->obtener();
          $this->VRelacionesF->actualizar($miembros,$familias,$parentezco);
    }
    public Function EliminarRelacion($id_miembro,$id_familiar){
          $this->MRelacionesF->EliminarR($id_miembro,$id_familiar);
          $familias = $this->MRelacionesF-> mostrarFamiliares();
          $miembros = $this->MMiembro-> mostrarMiembros();
          $parentezco = $this->MParentezco->obtener();
          $this->VRelacionesF->actualizar($miembros,$familias,$parentezco);
    }
}