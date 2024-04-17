<?php 

declare(strict_types=1);

require_once ('../app/models/MMiembro.php'); 
require_once ('../app/models/MMinisterio.php');
require_once ('../app/models/MServidor.php');
require_once ('../app/views/VMinisterio.php'); 

class CMinisterio{
    
    private VMinisterio $VMinisterio;
    private MMinisterio $MMinisterio;
    private MServidor $MServidor;
    private MMiembro $MMiembro;
   // private MCargo $modeloCargo;

    public function __construct()
    {
        $this-> VMinisterio = new VMinisterio();
        $this->MMinisterio = new MMinisterio(); 
        $this->MServidor = new MServidor();
        $this->MMiembro = new MMiembro();
    }

    public function MostrarMinisterios()
    {
        $ministerios = $this->MMinisterio-> mostrarMinisterios();
        $miembros = $this->MMiembro->mostrarMiembros();
        $ministerio=NULL;
        $this->VMinisterio->actualizar($ministerios,$ministerio,$miembros);     
    }
    public function RegistrarMinisterio($descripcion){
        $miembros = $this->MMiembro->mostrarMiembros();
        $this->MMinisterio->AgregarMinisterio($descripcion);
        $miniterios = $this->MMinisterio-> mostrarMinisterios();
        $ministerio=NULL;
        $this->VMinisterio->actualizar($miniterios,$ministerio,$miembros); 
    }
    public function MostrarMinisterio($id_ministerio)
    {
        $miembros = $this->MMiembro->mostrarMiembros();
        $ministerios = $this->MMinisterio-> mostrarMinisterios();
        $ministerio = $this->MServidor-> mostrar($id_ministerio);
        $this->VMinisterio->actualizar($ministerios,$ministerio,$miembros);     
    }
    public Function RegistrarServidor($id_miembro,$id_ministerio,$anodeIngreso,$estado)
    {
        $this->MServidor->registrar($id_miembro,$id_ministerio,$anodeIngreso,$estado);
        $ministerios = $this->MMinisterio-> mostrarMinisterios();
        $miembros = $this->MMiembro->mostrarMiembros();
        $ministerio = $this->MServidor-> mostrar($id_ministerio);
        $this->VMinisterio->actualizar($ministerios,$ministerio,$miembros);
    }
    public function editMinisterio($id)
    {
        $ministerio=$this->MMinisterio->obtenerporID($id);
        $this->VMinisterio-> FormEditarM($ministerio);

    }
    public function actualizarMinisterio($id,$descripcion): void
    {
        $this->MMinisterio->actualizar($id,$descripcion);
        $ministerios = $this->MMinisterio-> mostrarMinisterios();
        $miembros = $this->MMiembro->mostrarMiembros();
        $ministerio=NULL;
        $this->VMinisterio->actualizar($ministerios,$ministerio,$miembros); 
    }

    public function eliminarMinisterio($id)
    {
        $this->MMinisterio->delete($id);
        $ministerios = $this->MMinisterio-> mostrarMinisterios();
        $miembros = $this->MMiembro->mostrarMiembros();
        $ministerio=NULL;
        $this->VMinisterio->actualizar($ministerios,$ministerio,$miembros); 
    }
    public function editServidor($id_miembro,$id_ministerio)
    {
        $servidor=$this->MServidor->obtenerporID($id_miembro,$id_ministerio);
        $this->VMinisterio-> FormEditarS($servidor);

    }
    public function actualizarServidor($id_miembro,$id_ministerio,$anodeIngreso,$estado): void
    {
        $this->MServidor->actualizar($id_miembro,$id_ministerio,$anodeIngreso,$estado);
        $ministerios = $this->MMinisterio-> mostrarMinisterios();
        $miembros = $this->MMiembro->mostrarMiembros();
        $ministerio=NULL;
        $this->VMinisterio->actualizar($ministerios,$ministerio,$miembros); 
    }
    

    
}