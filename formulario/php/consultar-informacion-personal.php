<?php

    $conn =  mysqli_connect("localhost", "root", "daniel123", "skytv",8000);

    // Verificar la conexión
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    
    
    $id_usuario = $_SESSION["id_cuenta"];
    
    // ...
    // Consultar la base de datos para buscar la pelicula proporcionada
    $sql = "SELECT * FROM cuenta where id_cuenta= $id_usuario";
    $result = mysqli_query($conn, $sql);
    $informacion = mysqli_fetch_assoc($result);

     // Establecer el conjunto de caracteres utf8
     mysqli_set_charset($conn, "utf8");

    if (mysqli_num_rows($result) > 0) {

        $sql2 = "SELECT * FROM cliente where id_cliente='{$informacion['id_cliente']}'";
        $result2 = mysqli_query($conn, $sql2);
        $informacion2 = mysqli_fetch_assoc($result2);

        echo '<article>';
        echo '<h2 class="fs-5">INFORMACIÓN PERSONAL </h2>';
        echo '<p id="nombre" class="text-capitalize fs-6" >';
        echo $informacion2["nombre"]; 
        echo '</p>';
        echo '<button class="btn btn-primary btn-campo nombre mb-3 fs-6" onclick="cambiarInformacion(\'nombre\',' . $informacion['id_cliente'] . ')">Editar Nombre</button>';
        echo '<p id="email" class="fs-6">';
        echo $informacion2["email"];  
        echo '</p>';
        echo '<button class="btn btn-primary btn-campo email mb-3 fs-6" onclick="cambiarInformacion(\'email\',' . $informacion['id_cliente'] . ')">Editar Email</button>';
        echo '<p id="telefono" class="fs-6">';
        echo $informacion2["telefono"];
        echo '</p>';
         echo '<button class="btn btn-primary btn-campo telefono fs-6" onclick="cambiarInformacion(\'telefono\',' . $informacion['id_cliente'] . ')">Editar Telefono</button>';

        echo '</article>';
        echo '<hr>';
    
      
    } else {
     
        echo $id_usuario;
    
    }
    
   
?>