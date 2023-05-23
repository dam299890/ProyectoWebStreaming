

<?php
// Conectarse a la base de datos
$conn = mysqli_connect("localhost", "root", "daniel123", "peliculas",8000);

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
// Establecer el conjunto de caracteres utf8
mysqli_set_charset($conn,"utf8");
// Consulta SQL para recuperar los datos de la tabla de películas
$sql = "SELECT * FROM peliculas";
$resultado = mysqli_query($conn, $sql);

// Generar dinámicamente el código HTML para cada modal
if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<div class="pelicula">';
        echo '<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal' . $fila["id"] . '">';
        echo '<img class="img-carousel" src="' . $fila["portada"] . '" alt="">';
        echo '</button>';

        if(($_SESSION["tarifa"]== "regular"and $fila["any"] >= 2020) || 
        ($_SESSION["tarifa"]== "gratis"and $fila["any"] >= 2018)){
        echo '<div class="icon-container">';
        echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">';
        echo'<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>';
        echo'</svg>';
        echo '</div>';
       }
        echo '</div>';
        echo "Bienvenido, " . $fila["any"]. "!";
        echo "Bienvenido, " . $_SESSION["tarifa"] . "!";
        var_dump($_SESSION["tarifa"] == "gratis" && $fila["any"] < 2018);

        if (($_SESSION["tarifa"] == "gratis" && intval($fila["any"]) <= 2018)
        ) {
          echo '<div class="modal fade" id="exampleModal' . $fila["id"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
          echo '<div class="modal-dialog modal-dialog-centered">';
          echo '<div class="modal-content  bg-modal text-white">';
          echo '<div class="modal-header">';
          echo '<h1 class="modal-title fs-5">' . $fila["nombre"] . '</h1>';
          echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
          echo '</div>';
          echo '<div class="modal-body">';
          echo '<p>' . $fila["descripcion"] . '</p>';
          echo '</div>';
          echo '<div class="modal-footer">';
          echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
      }
      
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>