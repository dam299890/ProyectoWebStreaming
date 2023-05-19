<?php

function generarEpisodios($fila) {
          // Conectarse a la base de datos
          $conn = mysqli_connect("localhost", "root", "daniel123", "skytv", 8000);

           // Verificar la conexión
          if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
          }
          // Establecer el conjunto de caracteres utf8
          mysqli_set_charset($conn, "utf8");

          $id_serie =  $fila["id_contenido"];
          $id_cuenta = $_SESSION["id_cuenta"];

          $sql = "SELECT * FROM serie INNER JOIN episodios
          ON serie.id_contenido=episodios.id_serie
          WHERE episodios.id_serie=$id_serie";

            $resultado = mysqli_query($conn, $sql);
         
          

          // Generar dinámicamente el código de los episodios
          if (mysqli_num_rows($resultado) > 0) {
            echo '<ul class="list-group list-group-numbered m-3 lista">';
            while ($serie = mysqli_fetch_assoc($resultado)) {
                echo '<form method="post" action="php/agregar-episodios-vistos.php">';
                echo '<input type="hidden" name="id_serie" value="' . $serie["id_serie"] . '" />';
                echo '<input type="hidden" name="id_episodio" value="' . $serie["id_episodio"] . '" />';
                echo '<input type="hidden" name="id_cuenta" value="' . $id_cuenta . '" />';
                echo '<li class="list-group-item bg-dark text-white w-100 align-baseline fs-6">';  
                echo   $serie["id_episodio"] . '. ' . $serie["nombre"]  ;
                echo '<button type="submit" class="btn btn-secondary btn-sm float-end"><i class="fa-solid fa-eye" style="color: #d0d5dc;"></i></button>';
                echo '</li>';
                echo '</form>';
              
            }
            echo '</ul>';
          }else {
       
          }
          // Cerrar la conexión a la base de datos
          mysqli_close($conn);

        }
          ?>