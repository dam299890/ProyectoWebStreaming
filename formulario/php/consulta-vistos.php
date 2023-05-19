<?php

    $conn = mysqli_connect("localhost", "root", "daniel123", "skytv", 8000);

    mysqli_set_charset($conn,"utf8");

    // Consultar la base de datos para el contenido
    $sql = "SELECT * FROM contenido  where id_contenido=$id_contenido";

    $resultado = mysqli_query($conn, $sql);

    $sql2 = "SELECT * FROM serie INNER JOIN episodios
    ON serie.id_contenido=episodios.id_serie
    WHERE episodios.id_serie=$id_contenido";


      $resultado2 = mysqli_query($conn, $sql2);
      $id_cuenta = $_SESSION["id_cuenta"];


    if ($contenido = mysqli_fetch_assoc($resultado)) {

        vistaReproductor($contenido);

 
    } else{

    }

    //si el contenido es una serie imprimir los episodios
    if (mysqli_num_rows($resultado2) > 0) {

        echo '<h2>Episodios</h2>';
        echo '<ul class="list-group list-group-numbered  m-3 lista">';
        while ($serie = mysqli_fetch_assoc($resultado2)) {
            echo '<div class="accordion" id="accordionExample">';
            echo '<div class="accordion-item">';
            echo '<h2 class="accordion-header">';
            echo '<form method="post" class="bg-dark" action="php/agregar-episodios-vistos.php">';
            echo '<input type="hidden" name="id_serie" value="' . $serie["id_serie"] . '" />';
            echo '<input type="hidden" name="id_episodio" value="' . $serie["id_episodio"] . '" />';
            echo '<input type="hidden" name="id_cuenta" value="' . $id_cuenta . '" />';
            echo '<li class="rounded list-group-item bg-dark text-white w-100 fs-6">';   
            echo '<button class="accordion-button collapsed d-inline-flex text-white bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $serie["id_episodio"] . '" aria-expanded="false" aria-controls="collapse' . $serie["id_episodio"] . '">';
            echo   $serie["id_episodio"] . '. ' . $serie["nombre"]  ;
            echo '</button>';
            echo '<button type="submit" class="btn btn-secondary btn-sm"><i class="fa-solid fa-eye" style="color: #d0d5dc;"></i></button>';
            echo '</li>';
            echo '</form>';
            echo '</h2>';            
            echo ' <div id="collapse' . $serie["id_episodio"] . '" class="accordion-collapse collapse" data-bs-parent="#accordionExample">';
            echo ' <div class="accordion-body text-white">';
            echo'<h4 class="fs-6 capitalize"> Actores: </h4>'; 
            require 'consulta-actores-episodios.php';
            echo'<h4 class="fs-6 capitalize mt-1"> Director(es): </h4>'; 
            require 'consulta-director-episodio.php';
          
            echo '</div>';
            echo '</div>';
            echo '</div>';
        
        }
        echo '</ul>';
      }





function vistaReproductor($contenido){


    $nombre = $contenido["nombre_contenido"];

    echo '<header>';
    echo '<h1 class="titulo">' . $nombre . '</h1>';
    echo '</header>';
    
    echo '<main>';
    echo '<div class="contenedor">';
    echo '<video class="fm-video video-js vjs-16-9 vjs-big-play-centered" data-setup="{}" controls id="fm-video" autoplay>';
    echo '<source src="video/video.mp4" type="video/mp4">';
    echo '</video>';
    echo '<a class="btn btn-primary" href="home.php" role="button">Atrás</a>';
    echo '<article>';
    echo '<h2>' . $nombre . '</h2>';
    echo '<p>' . $contenido["descripcion"] . '</p><br />';
    
    

}

// Cerrar la conexión a la base de datos
