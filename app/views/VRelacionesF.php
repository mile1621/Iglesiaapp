<?php
//declare(strict_types=1);

class VRelacionesF
{
    public function actualizar($miembros,$familias,$parentezco)
    {
        echo '<html>';
        $navegacion=$this->Nav();
        echo  $navegacion;
        echo '
        <body>
        <h2>Relaciones Familiares</h2>
        <form action="Familia" method="POST">
        <select name="id_miembro" id="id_miembro">';
        echo '<option value="" disabled selected>Miembro</option>';
        foreach ($miembros as $opcion) {    
            echo '<option value="' . $opcion['id'] . '">' . $opcion['nombre']  . '</option>';
        }
        echo '</select>
        <select name="id_familiar" id="id_familiar">';
        echo '<option value="" disabled selected>Familiar</option>';
        foreach ($miembros as $opcion) {
            echo '<option value="' . $opcion['id'] . '">' . $opcion['nombre']  . '</option>';
        }
        echo '</select>
        <select name="id_parentezco" id="id_parentezco">';
        echo '<option value="" disabled selected>Parentezco</option>';
        foreach ($parentezco as $opcion) {
            echo '<option value="' . $opcion['id'] . '">' . $opcion['descripcion']  . '</option>';
        }
        echo '</select>
        <br><br>
        <button type="submit">Registrar</button>
        </form>';
         $this->TablaRelaciones($familias,$miembros);
        echo '</body>';
    }

    public function TablaRelaciones($familias,$miembros){
       echo '<div>
       <h2>Familiares en la Iglesia</h2>
       <p>Si deseas ver los familiares de un miembro, seleccionalo</p>
       <form action="Familia" method="POST">
       <select name="id_miembro" id="id_miembro">
        <option value="" disabled selected>Miembro</option>';
        foreach ($miembros as $opcion) {
            echo '<option value="' . $opcion['id'] . '">' . $opcion['nombre']  . '</option>';
        }
        echo '</select>
        <button type="submit">Ver Familiares</button>
        </form>';
        echo '<table border = "1" width="70%">
        <thead>
           <tr>
           <th> ID_MIEMBRO </th>
           <th> MIEMBRO </th>
           <th> ID_FAMILIAR </th>
           <th> FAMILIAR</th>
           <th> PARENTEZCO </th>
           <th> ACCION</th>      
           </tr>
        </thead>
        <tbody>';
        foreach($familias as $familiares) {
           echo "<tr>";
           echo "<td>".$familiares['miembro_id']."</td>";
           echo "<td>".$familiares['nombre_miembro']."</td>";
           echo "<td>".$familiares['familiar_id']."</td>";
        //   $fecha_nacimiento = date('d/m/Y', strtotime($miembro['fecha_nacimiento']));
           echo "<td>".$familiares['nombre_familiar']."</td>";
           echo "<td>".$familiares['parentezco']."</td>";
           echo "<td>";

           echo "<form action='/Familia' method='post' style='display: inline;'>";
           echo "<input type='hidden' name='id_miembro' value='{$familiares['miembro_id']}'>";
           echo "<input type='hidden' name='id_familiar' value='{$familiares['familiar_id']}'>";
           echo "<button type='submit' style='border: none; background: none; color: blue; cursor: pointer;'>Eliminar</button>";
           echo "</form>"; // Cierra el formulario de Eliminar

            // Cierra el formulario de Familia
           echo "</td>";
           echo "</tr>";
        }
      echo '</tbody>
        </table>
       </div>';
    }

    public function Nav()
    {
        $navegacion = '<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Barra de Navegación</title>
        <style>
        /* Estilos para la barra de navegación */
         nav {
          background-color: #333;
          overflow: hidden;
         }
         nav a {
          float: left;
          display: block;
          color: white;
          text-align: center;
          padding: 14px 20px;
          text-decoration: none;
          }
          nav a:hover {
          background-color: #ddd;
          color: black;
         }
         </style>
     </head>
     <nav>
     <a href="/">Inicio</a>
     <a href="/Miembro">Miembros</a>
     <a href="/Familia">Relaciones Familiares</a>
     <a href="/Ministerio">Ministerios</a>
     </nav>';

        return $navegacion;
    }
    
}
?>
