<?php 
require_once('../app/controllers/CInicio.php');
require_once('../app/controllers/CMiembro.php');
require_once('../app/controllers/CRelacionesF.php');
require_once('../app/controllers/CMinisterio.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/') {
    $home = new CInicio();
    $home->inicio();
    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/Miembro') { 
    $miembro = new CMiembro(); 
    $miembro->CMostrarMiembros();
    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/Miembro') { 
    //echo "Valor de sexo: " . $_POST['sexo'];   
    $miembro = new CMiembro();
    $miembro->agregarMiembro($_POST['ci'], $_POST['nombre'],$_POST['fechanacimiento'], $_POST['sexo'], $_POST['telefono']); 
    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/editar_miembro') { // Cambiado a '/editar_cargo'


    $miembro = new CMiembro(); 
    $miembro->editMiembro($_POST['id']); // Cambiado a mostrarFormularioEdicionC
    return;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/Miembro_acciones') { 
    if (count($_POST) > 1) {
        $miembro = new CMiembro(); 
        $miembro->actualizarMiembro($_POST['id'],$_POST['ci'], $_POST['nombre'],$_POST['fechanacimiento'], $_POST['sexo'], $_POST['telefono']);
    } else {
        $miembro = new CMiembro(); 
        $miembro->eliminarMiembro($_POST['id']);
    }
    return;
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/Familia') {
    $miembro = new CRelacionesF();
    $miembro->MostrarFamilia();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/Familia') {
    $miembro = new CRelacionesF();
    if(count($_POST) == 1) {
        $miembro->ObtenerFamilia($_POST['id_miembro']);
    }else if (count($_POST) ==3){
        $miembro->RegistrarFamilia($_POST['id_miembro'],$_POST['id_familiar'],$_POST['id_parentezco']);
    }else{
        $miembro->EliminarRelacion($_POST['id_miembro'],$_POST['id_familiar']);
    }
    
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/Ministerio') {
    $ministerio= New CMinisterio();
    if (count($_POST) > 1) {
        $ministerio->actualizarServidor($_POST['id_miembro'],$_POST['id_ministerio'], $_POST['anodeIngreso'],$_POST['estado']);
    } else {
        $ministerio->MostrarMinisterios();
    }
    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/Ministerio') {
    
    $ministerio = new CMinisterio();
    $ministerio->RegistrarMinisterio($_POST['descripcion']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/VMinisterio') {
    
    $ministerio = new CMinisterio();
    if (isset($_POST['accion'])) {
        $accion = $_POST['accion'];
        switch ($accion) {
            case 'ver':
                // Código para el botón "Ver Ministerio"
                $ministerio->MostrarMinisterio($_POST['id_ministerio']);
                break;
            case 'registrar':
                // Código para el otro botón
                $ministerio->RegistrarServidor($_POST['id_miembro'],$_POST['id_ministerio'],$_POST['anodeIngreso'],$_POST['estado']);
                break;
            default:
                // Manejar el caso si se presionó otro botón no esperado
                echo "Se presionó un botón no reconocido";
                break;
        }
    }
return;
   
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/editar_ministerio') { // Cambiado a '/editar_cargo'
    $miembro = new CMinisterio(); 
    $miembro->editMinisterio($_POST['id']); // Cambiado a mostrarFormularioEdicionC
    return;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/Ministerio_acciones') { 
    $ministerio = new CMinisterio();
    if (count($_POST) > 1) { 
        $ministerio->actualizarMinisterio($_POST['id'],$_POST['descripcion']);
    } else {
        $ministerio->eliminarMinisterio($_POST['id']);
    }
    return;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/editar_servidor') { // Cambiado a '/editar_cargo'
    $miembro = new CMinisterio(); 
    $miembro->editServidor($_POST['id_miembro'],$_POST['id_ministerio']); // Cambiado a mostrarFormularioEdicionC
    return;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/Servidor_acciones') { // Cambiado a '/editar_cargo'
    $miembro = new CMinisterio(); 
    $miembro->actualizarServidor($_POST['id_miembro'],$_POST['id_ministerio'],$_POST['anodeIngreso'],$_POST['estado']); // Cambiado a mostrarFormularioEdicionC
    return;
}





