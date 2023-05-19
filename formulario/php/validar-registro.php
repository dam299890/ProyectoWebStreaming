
<?php  // Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "daniel123", "skytv",8000);

$nombre_usuario = $_POST["email"];
$usuario = $_POST["usuario"];
$contrasena = $_POST["contrasena"];
$nombre = $_POST["name"];
$telefono = $_POST["telefono"];
$dni = $_POST["dni"];
//obtener la fecha de nacimiento y restarla a la fecha actual
//para obtener la edad
$fecha_nacimiento = $_POST["fecha"];
$fecha_actual = date('d/m/Y');

$edad = date_diff(date_create($fecha_nacimiento), date_create($fecha_actual))->y;
//***** */
$direccion = $_POST["direccion"];
$nacionalidad = $_POST["nacionalidad"];
$num_cuenta = $_POST["num_cuenta"];
$num_tarjeta = $_POST["num_tarjeta"];




// Consultar la base de datos para buscar al usuario con el nombre de usuario proporcionado
$resultado = mysqli_query($conexion, "SELECT * FROM cliente WHERE email='$nombre_usuario'");


// Verificar si el correo proporcionado ya esta en uso
if ($fila = mysqli_fetch_assoc($resultado)) {
  header("location: ../registro.php?error=true");
} else {

        $sql = "INSERT INTO cliente 
        (nombre, email, dni, edad, direccion, nacionalidad, telefono) VALUES 
        ('$nombre', '$nombre_usuario', '$dni', '$edad','$direccion', '$nacionalidad', '$telefono')";
        
        if (mysqli_query($conexion, $sql)) {

          // Obtener el ID del cliente recién insertado
          $id_cliente = mysqli_insert_id($conexion);


               $sql = "INSERT INTO cuenta
              (usuario, contrasena,id_cliente) VALUES 
              ('$usuario', '$contrasena','$id_cliente')";                  
                
                 if (mysqli_query($conexion, $sql)) {

                  $id_cuenta = mysqli_insert_id($conexion);
                  session_start();
                   $_SESSION["id_cuenta"] = $id_cuenta;
                   header("location: ../registro-2.php");
                 
                  echo "El registro se ha insertado correctamente.";
                } else {
                  // Ha habido un error al insertar en la tabla "cuenta"
                  echo "Error al insertar en la tabla 'cuenta': " . mysqli_error($conn);
                }
      } else {
        echo "Error al insertar los datos en la base de datos: " . mysqli_error($conexion);

  }
}
mysqli_close($conexion);
?>


