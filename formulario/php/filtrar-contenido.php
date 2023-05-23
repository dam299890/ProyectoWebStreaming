<?php

include 'funciones-favoritos.php';
session_start();

$nombre_usuario =  $_SESSION["id_cuenta"];
$tipo_contenido = $_POST["tipo"];
$id_usuario = $_POST["cuenta"];
$tarifa = $_POST["tarifa"];


// Verificar si las variables POST han sido definidas
if (($_POST["tipo"] != 0) && ($_POST["cuenta"] != 0)) {
    // Conectarse a la base de datos
    $conn = mysqli_connect("localhost", "root", "daniel123", "skytv", 8000);

    // Verificar la conexión
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Establecer el conjunto de caracteres utf8
    mysqli_set_charset($conn, "utf8");

    // Consulta SQL para recuperar los datos de la tabla de películas
    $sql = "SELECT * FROM $tipo_contenido
            INNER JOIN contenido ON $tipo_contenido.id_contenido=contenido.id_contenido
            INNER JOIN ser_favorito ON contenido.id_contenido = ser_favorito.id_contenido
            INNER JOIN cuenta ON ser_favorito.id_cuenta = cuenta.id_cuenta
            WHERE cuenta.id_cuenta = $id_usuario";

    $resultado = mysqli_query($conn, $sql);

    // Generar dinámicamente el código HTML para cada modal
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {

            generarPelicula($fila, $tarifa);
           

        }

    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}
else if (($_POST["tipo"] == 0)) {



    // Conectarse a la base de datos
    $conn = mysqli_connect("localhost", "root", "daniel123", "skytv", 8000);
    // Verificar la conexión
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    // Establecer el conjunto de caracteres utf8
    mysqli_set_charset($conn, "utf8");
    // Consulta SQL para recuperar los datos de la tabla de películas
    $sql = "SELECT * FROM contenido
        INNER JOIN ser_favorito ON contenido.id_contenido = ser_favorito.id_contenido
        INNER JOIN cuenta ON ser_favorito.id_cuenta = cuenta.id_cuenta
        WHERE cuenta.id_cuenta = $id_usuario";
    $resultado = mysqli_query($conn, $sql);

    // Generar dinámicamente el código HTML para cada modal
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            generarPelicula($fila, $tarifa);
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}

else if (($_POST["tarifa"] == 0)) {



    // Conectarse a la base de datos
    $conn = mysqli_connect("localhost", "root", "daniel123", "skytv", 8000);
    // Verificar la conexión
    if (!$conn) {
        die("Error de conexión: " . mysqli_connect_error());
    }
    // Establecer el conjunto de caracteres utf8
    mysqli_set_charset($conn, "utf8");
    // Consulta SQL para recuperar los datos de la tabla de películas
    $sql = "SELECT * FROM contenido
        INNER JOIN ser_favorito ON contenido.id_contenido = ser_favorito.id_contenido
        INNER JOIN cuenta ON ser_favorito.id_cuenta = cuenta.id_cuenta
        WHERE cuenta.id_cuenta = $nombre_usuario";
    $resultado = mysqli_query($conn, $sql);

    // Generar dinámicamente el código HTML para cada modal
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {

            generarPelicula($fila, $fila["id_modalidad"]);
        }
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}
?>