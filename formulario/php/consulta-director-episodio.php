
<?php


 $sql3 = "SELECT * FROM episodios INNER JOIN dirige_episodio
 ON episodios.id_serie=dirige_episodio.id_serie 
 and episodios.id_episodio=dirige_episodio.id_episodio
 INNER JOIN director on dirige_episodio.id_director=director.id_director
 WHERE episodios.id_serie=$id_contenido 
 and episodios.id_episodio= {$serie["id_episodio"]}";

   $resultado3 = mysqli_query($conn, $sql3);



   
   while ($director = mysqli_fetch_assoc($resultado3)) {
     
     echo '<p class="fs-6 d-inline">'. $director["nombre"] .' </p>';
     }


     ?>