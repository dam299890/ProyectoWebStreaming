<?php
// Inicia sesión
session_start();

// Verifica si el usuario ha iniciado sesión
if(isset($_SESSION["id_cuenta"])) {
  // Si el usuario ha iniciado sesión, muestra su nombre de usuario

} else {
  // Si el usuario no ha iniciado sesión, redirige a la página de inicio de sesión
  header('Location: login.php');
  exit();
}

?>