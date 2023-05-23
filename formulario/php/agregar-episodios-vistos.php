<?php
session_start();
// Crear conexión
$conn =  mysqli_connect("localhost", "root", "daniel123", "skytv",8000);

// Verificar la conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



$id_usuario = $_POST["id_cuenta"];
$id_serie = $_POST["id_serie"];
$id_episodio = $_POST["id_episodio"];

// ...
// Consultar la base de datos para buscar el episodio
$sql = "SELECT * FROM ha_visto_episodio where id_cuenta = $id_usuario and id_serie= $id_serie and id_episodio= $id_episodio";
$result = mysqli_query($conn, $sql);
$registro = mysqli_fetch_assoc($result);


// Verificar si el episodio ha sido visto

if (mysqli_num_rows($result) > 0) {

    $sql = "UPDATE ha_visto_episodio 
    SET num_vistos = '{$registro['num_vistos']}'+1 
    where id_cuenta = $id_usuario 
    and id_serie= $id_serie and id_episodio= $id_episodio";

  
  if (mysqli_query($conn, $sql)) {
    $_SESSION["id_contenido"] = $id_serie ;
    header('Location: ../ver-pelicula.php');
    } else {
      echo "Error al agregar a visto el episodio: " . mysqli_error($conexion);

}
} else {
 

    $sql = "INSERT INTO ha_visto_episodio (id_cuenta, id_episodio, id_serie) VALUES
     ('$id_usuario', '$id_episodio', '$id_serie')";
        if (mysqli_query($conn, $sql)) {
          $_SESSION["id_contenido"] = $id_serie ;
          header('Location: ../ver-pelicula.php');
      } else {
        echo "Error al insertar los datos en la base de datos: " . mysqli_error($conexion);

  }
}


?>