<?php

Class VMinisterio{


    public function actualizar($ministerios, $ministerio,$miembros) {
        echo '<html>';
        $navegacion = $this->Nav();
        echo $navegacion;
        echo '
        <body>
        <div id="MINI" style="display: flex; flex-direction: row;">
        <div style="flex: 1;">
        <h2>Ministerios</h2>
        </div>
        <div style="flex: 1;">
        <h2>Servidores de un Ministerio</h2>
        </div> 
        </div>
        <div id="form_ministerio" style="display: flex; flex-direction: row;">';
        $min = $this->NuevoMin($ministerios);
        
        echo $min;
        echo '
        <div style="flex: 1;">
        <form action="VMinisterio" method="POST">
        <select name="id_ministerio" id="id_miembro">
        <option value="" disabled selected>Ministerio</option>';
        
        foreach ($ministerios as $opcion) {
            echo '<option value="' . $opcion['id'] . '">' . $opcion['descripcion'] . '</option>';
        }
        
        echo '</select>
        <button type="submit" name="accion" value="ver">Ver Ministerio</button><br><br>
        <select name="id_miembro" id="miembro">
        <option value="" disabled selected>miembro</option>';
        foreach ($miembros as $opcion) {
            echo '<option value="' . $opcion['id'] . '">' . $opcion['nombre'] . '</option>';
        }
        echo'
        </select><br><br>
       <input type="text" name="anodeIngreso" placeholder="Año de Ingreso"><br><br>
       <select name="estado" id="estado">
        <option value="" disabled selected>Estado</option>
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
       </select><br><br>
        <button type="submit" name="accion" value="registrar">Registrar </button><br><br>
        </form>';
        
        echo $this->Tablaministerio($ministerio);
        echo '</div>';
        echo '
        </div>';
        echo '</body>
        </html>';
    }
    
    public function NuevoMin($ministerios): string {
        $MinisterioForm = '
        <div style="flex: 1">
         <form action="/Ministerio" method="post" style="margin-bottom: 20px;">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label for="descripcion" style="margin-right: 40px; color: blue;">NOMBRE</label>
                        <input name="descripcion" type="text" id="descripcion" required>
                    </div> 
                </div>                      
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="add-button" type="submit">Registrar</button>
                    </div>
                </div>
         </form>
         <table border="1" width="70%">
            <thead>
               <tr>
                   <th> ID </th>
                   <th> NOMBRE </th> 
                   <th> ACCIONES </th>    
               </tr>
            </thead>
            <tbody>';
    
        foreach ($ministerios as $ministerio) {
            $MinisterioForm .= "<tr>";
            $MinisterioForm .= "<td>".$ministerio['id']."</td>";
            $MinisterioForm .= "<td>".$ministerio['descripcion']."</td>";
            $MinisterioForm .= "<td>";
            $MinisterioForm .= "<form action='/editar_ministerio' method='post' style='display: inline;'>";
            $MinisterioForm .= "<input type='hidden' name='id' value='{$ministerio['id']}'>";
            $MinisterioForm .= "<button type='submit' style='border: none; background: none; color: blue; cursor: pointer;'>Editar</button>";
            $MinisterioForm .= "</form>"; // Cierra el formulario de Editar
            $MinisterioForm .= " | ";
            $MinisterioForm .= "<form action='/Ministerio_acciones' method='post' style='display: inline;'>";
            $MinisterioForm .= "<input type='hidden' name='id' value='{$ministerio['id']}'>";
            $MinisterioForm .= "<button type='submit' style='border: none; background: none; color: blue; cursor: pointer;'>Eliminar</button>";
            $MinisterioForm .= "</form>"; 
            $MinisterioForm .= "</td>";
            $MinisterioForm .= "</tr>";
        }
    
        $MinisterioForm .= "</tbody>
            </table>
         </div>";
    
        return $MinisterioForm;
    }
    
    public function Tablaministerio($ministerio){
        echo '<table border = "1" width="70%">
        <thead>
           <tr>
           <th> MIEMBRO </th>
           <th> AÑO DE INGRESO </th>
           <th> ESTADO</th>
           <th> ACCION</th>      
           </tr>
        </thead>
        <tbody>';
        foreach($ministerio as $ministerio) {
           echo "<tr>";
           echo "<td>".$ministerio['miembro_nombre']."</td>";
           echo "<td>".$ministerio['anodeingreso']."</td>";
           echo "<td>".$ministerio['estado']."</td>";
           echo "<td>";

           echo "<form action='/editar_servidor' method='post' style='display: inline;'>";
           echo "<input type='hidden' name='id_miembro' value='{$ministerio['miembro_id']}'>";
           echo "<input type='hidden' name='id_ministerio' value='{$ministerio['ministerio_id']}'>";
           echo "<button type='submit' style='border: none; background: none; color: blue; cursor: pointer;'>Editar</button>";
           echo "</form>"; // Cierra el formulario de Eliminar

            // Cierra el formulario de Familia
           echo "</td>";
           echo "</tr>";
        }
         echo '</tbody>
        </table>
       </div>';
    }

    public function FormEditarM($ministerio){
        echo "<h2>Editar Ministerio</h2>";
        echo "<form action='Ministerio_acciones' method='POST'>";
        echo "<input type='hidden' name='id' value='" . $ministerio['id'] . "'>";
        echo "<label for='descripcion'>Descripcion:</label>";
        echo "<input type='text' id='descripcion' name='descripcion' value='" . $ministerio['descripcion'] . "' required><br>";
        echo "<input type='submit' value='Actualizar'>";
        echo "</form>";

    }
    public function FormEditarS($servidor){
        echo "<h2>Editar Servidor</h2>";
        echo "<form action='Servidor_acciones' method='POST'>";
        echo "<input type='hidden' name='id_miembro' value='" . $servidor['id_miembro'] . "'>";
        echo "<input type='hidden' name='id_ministerio' value='" . $servidor['id_ministerio'] . "'>";
        echo "<label for='descripcion'>Año de Ingreso:</label>";
        echo "<input type='text' id='descripcion' name='anodeIngreso' value='" . $servidor['anodeingreso'] . "' required><br>";
        echo '<select name="estado" id="estado">
        <option value="" disabled selected>Estado</option>
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
        </select><br><br>';
        echo "<input type='submit' value='Actualizar'>";
        echo "</form>";

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