<?php
session_start();
// Crear conexión
$conn =  mysqli_connect("localhost", "root", "daniel123", "skytv",8000);

// Verificar la conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$id_usuario = $_SESSION["id_cuenta"];
$id_pelicula = $_POST["id_contenido"];
// ...
// Consultar la base de datos para buscar la pelicula proporcionada
$sql = "SELECT * FROM ser_favorito where id_cuenta = $id_usuario and id_contenido= $id_pelicula";
$result = mysqli_query($conn, $sql);



// Verificar si la pelicula esta en favoritos

if (mysqli_num_rows($result) > 0) {

  $sql = "DELETE FROM ser_favorito where id_cuenta = $id_usuario and id_contenido= $id_pelicula";
  
  if (mysqli_query($conn, $sql)) {
    echo "Los datos se han eliminado correctamente en la base de datos.";
    } else {
      echo "Error al eliminar los datos en la base de datos: " . mysqli_error($conexion);

}
} else {
 

    $sql = "INSERT INTO ser_favorito (id_cuenta, id_contenido) VALUES ('$id_usuario', '$id_pelicula')";
        if (mysqli_query($conn, $sql)) {
      echo "Los datos se han insertado correctamente en la base de datos.";
      } else {
        echo "Error al insertar los datos en la base de datos: " . mysqli_error($conexion);

  }
}


?>