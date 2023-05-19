<?php

function consultarFavorito($fila) {
// Crear conexión
$conn =   mysqli_connect("localhost", "root", "daniel123", "skytv",8000);

// Verificar la conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id_usuario = $_SESSION["id_cuenta"];
$id_pelicula =  $fila["id_contenido"];
// ...

// Verifica si el contenido esta en la tabla de favoritos
$sql = "SELECT *FROM ser_favorito where id_cuenta = $id_usuario and id_contenido= $id_pelicula";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    echo '<i class="fa-solid fa-star fa-bounce" style="color: #e5e907;"></i>';


  } else {

    echo '<i class="fa-regular fa-star fa-bounce" style="color: #e5e907;"></i>';
  }
}

function consultarFavoritoMiEspacio($fila) {
  // Crear conexión
  $conn =   mysqli_connect("localhost", "root", "daniel123", "skytv",8000);
  
  // Verificar la conexión
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $id_usuario = $fila["id_cuenta"];
  $id_pelicula =  $fila["id_contenido"];
  // ...
  
  // Ejecutar el insert
  $sql = "SELECT *FROM ser_favorito where id_cuenta = $id_usuario and id_contenido= $id_pelicula";
  $result = mysqli_query($conn, $sql);
  
  
  if (mysqli_num_rows($result) > 0) {
    echo '<i class="fa-solid fa-star fa-bounce" style="color: #e5e907;"></i>';


  } else {

    echo '<i class="fa-regular fa-star fa-bounce" style="color: #e5e907;"></i>';
  }
  }


?>