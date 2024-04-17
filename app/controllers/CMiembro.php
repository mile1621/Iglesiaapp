<?php 

declare(strict_types=1);

require_once ('../app/models/MMiembro.php'); 
require_once ('../app/views/VMiembro.php'); 

class CMiembro{
    
    private VMiembro $VMiembro;
    private MMiembro $MMiembro;

   // private MCargo $modeloCargo;

    public function __construct()
    {
        $this-> VMiembro = new VMiembro();
        $this->MMiembro = new MMiembro(); 
    }
    

    public function CMostrarMiembros(): void
    {
        $miembros = $this->MMiembro->mostrarMiembros();
       $this->VMiembro->actualizar($miembros);
    }

    public function agregarMiembro( $ci, $nombre,$fechanacimiento,$sexo, $telefono): void
    {
        $this->MMiembro->agregarMiembro($ci, $nombre,$fechanacimiento, $sexo, $telefono);
        $miembros = $this->MMiembro->mostrarMiembros();
        $this->VMiembro->actualizar($miembros);
    }
    public function editMiembro($id)
    {
        $miembro=$this->MMiembro->MiembroporID($id);
        $this->VMiembro-> FormEditar($miembro);

    }
    public function actualizarMiembro($id,$ci, $nombre,$fechanacimiento,$sexo, $telefono): void
    {
        $this->MMiembro->actualizarMiembro($id,$ci, $nombre,$fechanacimiento, $sexo, $telefono);
        $miembros = $this->MMiembro->mostrarMiembros();
        $this->VMiembro->actualizar($miembros);
    }

    public function eliminarMiembro($id)
    {
        $this->MMiembro->deleteMiembro($id);
        $miembros = $this->MMiembro->mostrarMiembros();
        $this->VMiembro->actualizar($miembros);
    }
}