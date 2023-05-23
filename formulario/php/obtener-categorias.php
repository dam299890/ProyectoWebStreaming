<?php   // Obtener el valor del parámetro enviado desde el formulario
$categoria = $_GET['categoria'];

// Validar que la variable esté definida y no esté vacía
if (isset($categoria) && !empty($categoria)) {
  
  // Limpiar el valor de la variable
  $categoria_limpia = filter_var($categoria, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // limpiamos el valor de la variable $categoria
  

} else {
  // Si la variable no está definida o está vacía, redirigir al usuario
  header("Location: ../home.php");
}
?>