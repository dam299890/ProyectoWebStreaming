<?php


// Crear conexión
$conn =   mysqli_connect("localhost", "root", "daniel123", "skytv",8000);

// Verificar la conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$pelicula = $_POST["pelicula"];
// ...

// Verifica si el contenido esta en la base de datos
$sql = "SELECT nombre_contenido FROM contenido where nombre_contenido = '$pelicula'";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    echo 'Contenido disponible';


  } else {
    echo 'Contenido no disponible';
  }


?>