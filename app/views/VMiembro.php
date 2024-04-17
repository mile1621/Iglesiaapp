<?php
//declare(strict_types=1);

class VMiembro{

    public function renderizarform(): string{
        $nuevoUsuarioForm = '
        
        <form action="/Miembro" method="post" style="flex: 1;">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label for="ci" style="margin-right: 40px; color: blue;">CI</label>
                        <input name="ci" type="number" id="ci" required>
                    </div> 
                    <div class="col-12 col-md-4" >
                        <label for="nombre" style=" margin-right: 5px; color: blue;">Nombre</label>
                        <input name="nombre" type="text" id="nombre" required>
                    </div>
                    <div class="col-12 col-md-4" >
                        <label for="fechanacimiento" style= "color: blue;">Fecha de Nacimiento</label>
                        <input name="fechanacimiento" type="text" id="fechanacimiento" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="sexo"style="margin-right: 25px; color: blue;">Sexo</label>
                        <select name="sexo" id="sexo" required>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="telefono" style=color:blue;>Telefono</label>
                        <input name="telefono" type="number" id="telefono" required>
                    </div>
                </div>';
                                      
 /*       foreach ($cargos as $cargo) {
            $nuevoUsuarioForm .= "<option value='{$cargo->getId()}'>{$cargo->getNombre()}</option>";
        }
*/
        $nuevoUsuarioForm .= '
                        
              <br>
                <div class="row mt-3">
                    <div class="col-12 d-flex justify-content-end">
                        <button class="add-button" type="submit">Agregar</button>
                    </div>
                </div>
            </form>
         
    ';



        return $nuevoUsuarioForm;
    
    }

    public function actualizar($miembros): void
    {
        echo 
        "<html>";
        $navegacion=$this->Nav();
        echo  $navegacion;
        echo  "<body>";
        echo'  <h2>Nuevo Miembro </h2>
        <div id="form_miembro" style="display: flex; flex-direction: row;">';
          echo $this->renderizarform();
          
          // echo "<h2>Miembros</h2>
         echo' <div style="flex: 2.5;">';         

         echo "<table border = '1' width='95%'>
               <thead>
                  <tr>
                  <th> ID </th>
                  <th> CI </th>
                  <th> NOMBRE </th>
                  <th> F. NAC. </th>
                  <th> SEXO </th>
                  <th> TELEFONO </th>
                  <th> ACCION</th>

                  
                  </tr>
               </thead>
               <tbody>";
               foreach($miembros as $miembro) {
                //echo $miembro;
                  echo "<tr>";
                  echo "<td>".$miembro['id']."</td>";
                  echo "<td>".$miembro['ci']."</td>";
                  echo "<td>".$miembro['nombre']."</td>";
               //   $fecha_nacimiento = date('d/m/Y', strtotime($miembro['fecha_nacimiento']));
                  echo "<td>".$miembro['fechanacimiento']."</td>";
                  echo "<td>".$miembro['sexo']."</td>";
                  echo "<td>".$miembro['telefono']."</td>";
                  echo "<td>";

                  echo "<form action='/editar_miembro' method='post' style='display: inline;'>";
                  echo "<input type='hidden' name='id' value='{$miembro['id']}'>";
                  echo "<button type='submit' style='border: none; background: none; color: blue; cursor: pointer;'>Editar</button>";
                  echo "</form>"; // Cierra el formulario de Editar
                  echo " | ";
                  echo "<form action='/Miembro_acciones' method='post' style='display: inline;'>";
                  echo "<input type='hidden' name='id' value='{$miembro['id']}'>";
                  echo "<button type='submit' style='border: none; background: none; color: blue; cursor: pointer;'>Eliminar</button>";
                  echo "</form>"; // Cierra el formulario de Eliminar
                 /* echo " | ";
                  echo "<form action='/Familia' method='post' style='display: inline;'>";
                  echo "<input type='hidden' name='id' value='{$miembro['id']}'>";
                  echo "<button type='submit' style='border: none; background: none; color: blue; cursor: pointer;'>Ver flia</button>";
                  echo "</form>";
                  echo " | ";
                  echo "<form action='/Familia_registro' method='post' style='display: inline;'>";
                  echo "<input type='hidden' name='id' value='{$miembro['id']}'>";
                  echo "<button type='submit' style='border: none; background: none; color: blue; cursor: pointer;'>Registrar Flia</button>";
                  echo "</form>";*/
                   // Cierra el formulario de Familia
                  echo "</td>";
                  echo "</tr>";
               }
             echo "</tbody>
               </table>
            </div>
            </div> 
            <br>      
            </body>
        </html>";

    }
    public function FormEditar($miembro){
        echo "<h2>Editar Miembro</h2>";
        echo "<form action='Miembro_acciones' method='POST'>";
        echo "<input type='hidden' name='id' value='" . $miembro['id'] . "'>";
        echo "<label for='ci'>CI:</label>";
        echo "<input type='number' id='ci' name='ci' value='" . $miembro['ci'] . "' required><br>";
        echo "<label for='nombre'>Nombre:</label>";
        echo "<input type='text' id='nombre' name='nombre' value='" . $miembro['nombre'] . "' required><br>";
        echo "<label for='fechanacimiento'>Fecha de Nacimiento:</label>";
        echo "<input type='text' id='fechanacimiento' name='fechanacimiento' value='" . $miembro['fechanacimiento'] . "' required><br>";
        echo "<label for='sexo'>Sexo:</label>";
        echo "<select id='sexo' name='sexo' required>";
        echo "<option value='M' " . ($miembro['sexo'] == 'M' ? 'selected' : '') . ">Masculino</option>";
        echo "<option value='F' " . ($miembro['sexo'] == 'F' ? 'selected' : '') . ">Femenino</option>";
        echo "</select><br>";
        echo "<label for='telefono'>Teléfono:</label>";
        echo "<input type='number' id='telefono' name='telefono' value='" . $miembro['telefono'] . "' required><br>";
        echo "<input type='submit' value='Actualizar'>";
        echo "</form>";

    }
    public function Nav()
    {
        $navegacion = '<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Miembros</title>
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