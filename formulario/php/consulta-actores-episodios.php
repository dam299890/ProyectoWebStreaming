<?php


  $sql3 = "SELECT * FROM episodios INNER JOIN actor_episodio
  ON episodios.id_serie=actor_episodio.id_serie 
  and episodios.id_episodio=actor_episodio.id_episodio
  INNER JOIN actores on actor_episodio.id_actor=actores.id_actor
   WHERE episodios.id_serie=$id_contenido 
   and episodios.id_episodio= {$serie["id_episodio"]}";

   $resultado3 = mysqli_query($conn, $sql3);



   
    while ($actor_serie = mysqli_fetch_assoc($resultado3)) {
     
     echo '<p class="fs-6 d-inline">'. $actor_serie["nombre_actor"] .' </p>';
     
    }


     ?>