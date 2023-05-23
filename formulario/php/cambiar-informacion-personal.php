<?php

    $conn =  mysqli_connect("localhost", "root", "daniel123", "skytv",8000);

    // Verificar la conexión
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    
    
    $id_usuario = $_POST["id_cliente"];
    $nuevaInfo = $_POST["nuevaInfo"];
    $campo = $_POST["campo"];
    
    // ...
    // Consultar la base de datos para buscar la cuenta y obtener el id del cliente 
    $sql = "SELECT * FROM cliente where id_cliente= $id_usuario";
    $result = mysqli_query($conn, $sql);
    $informacion = mysqli_fetch_assoc($result);


    if (mysqli_num_rows($result) > 0) {
        if ($informacion['id_cliente'] != $nuevaInfo) {
            $sql2 = "UPDATE cliente SET $campo = '$nuevaInfo' WHERE id_cliente = {$informacion['id_cliente']}";
    
            try {
                if (mysqli_query($conn, $sql2)) {
                   
                    echo $nuevaInfo;  
                   
                } else {
                    echo "Error al modificar el dato " . mysqli_error($conexion);
                }
            } catch (Exception $e) {
                echo 'Error: ingrese solo carácteres validos';
            }
        }
    } else {
        echo $id_usuario;
    }
    
    
?>