
<?php  // Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "daniel123", "skytv",8000);

// Obtener los datos del formulario de inicio de sesión
$nombre_usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];

// Consultar la base de datos para buscar al usuario con el nombre de usuario proporcionado
$resultado = mysqli_query($conexion, "SELECT * FROM cuenta WHERE usuario='$nombre_usuario'");

// Verificar si se encontró al usuario y si la contraseña es correcta
if ($fila = mysqli_fetch_assoc($resultado)) {
  if ($contrasena == $fila["contrasena"]) {
    $nombre = $fila["nombre"];
    $tarifa = $fila["id_modalidad"];
    // La contraseña es correcta, iniciar sesión

    session_start();
    $_SESSION["id_cuenta"] = $fila["id_cuenta"];
    $_SESSION["tarifa"] = $fila["id_modalidad"];
    // Redirigir al usuario a la página de inicio de sesión exitoso
    header("Location: ../home.php");
  } else {
    // La contraseña es incorrecta, mostrar un mensaje de error
    header("location: ../login.php?error=true2");
  }
} else {
  // No se encontró al usuario, mostrar un mensaje de error
  echo "Usuario no encontrado.";
  header("location: ../login.php?error=true1");
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
