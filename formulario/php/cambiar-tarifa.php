
<?php  // Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "daniel123", "skytv",8000);
session_start();
$nombre_usuario =  $_SESSION["id_cuenta"];
$tarifa = $_POST["tarifa"];


// Consultar la base de datos para buscar al usuario con el nombre de id cuenta proporcionado
$resultado = mysqli_query($conexion, "SELECT * FROM cuenta WHERE id_cuenta='$nombre_usuario'");


if ($fila = mysqli_fetch_assoc($resultado)) {


    $sql = "UPDATE cuenta
    SET id_modalidad='$tarifa' WHERE id_cuenta='$nombre_usuario'";
    $resultado2 = mysqli_query($conexion, $sql);
    header("location: ../registro-success.html");
      echo "tarifa actualizada";


} else {
    echo "no se pudo actualizar la tarifa";
    echo $nombre_usuario;
  }

mysqli_close($conexion);
?>



