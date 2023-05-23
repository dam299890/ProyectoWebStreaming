<?php

include 'php/consultar-favoritos.php';
include 'php/consultar-episodios.php';
function generarPelicula($fila) {

  
  
    echo '<div class="pelicula li">';
    echo '<input type="hidden" value="' . $fila["nombre_contenido"] . '" />';
    echo '<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal' . $fila["id_contenido"] . '">';
    echo '<img class="img-carousel" src="./img/'.$fila["portada"]  .'" alt="">';
    echo '</button>';
  
    if(($_SESSION["tarifa"]== "2" and $fila["anyo"] >= 2020) || 
      ($_SESSION["tarifa"]== "1" and $fila["anyo"] >= 2015)){
      echo '<div class="icon-container">';
      echo '<button type="button" class="btn btn-secondary example-popover" data-bs-custom-class="custom-popover" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="No incluido en la ';
      if($_SESSION["tarifa"]== "1"){

        echo  'tarifa Gratis">';

      }
      elseif($_SESSION["tarifa"]== "2"){

        echo  'tarifa Regular">';

      }
      
      echo '<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">';
      echo '<path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>';
      echo '</svg>';
      echo '</button>';
      echo '</div>';
      
    }
    echo '</div>';
    if (($_SESSION["tarifa"] == "1" and $fila["anyo"] < 2015) || 
        ($_SESSION["tarifa"]== "2" and $fila["anyo"] < 2020)||
        ($_SESSION["tarifa"] == "3" )) {

      echo '<div class="modal fade" id="exampleModal' . $fila["id_contenido"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">';
      echo '<div class="modal-dialog modal-dialog-centered">';
      echo '<div class="modal-content  bg-modal text-white">';
      echo '<div class="modal-header">';
      echo '<h1 class="modal-title fs-5">' . $fila['nombre_contenido'] . ' ' . $fila['anyo'] .   '</h1>';
      echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
      echo '</div>';
      echo '<div class="modal-body fs-6">';
      echo '<p>' . $fila["descripcion"] . '</p>';
      echo '</div>';
      echo '<div class="modal-footer">';

      echo '<input type="hidden" name="id" value="' . $fila["id_contenido"] . '" />';
      echo '<button type="submit" class="btn btn-secondary btn-fav" onclick="insertarDatos(' . $fila["id_contenido"] . ')">';
      consultarFavorito($fila);
      echo '    Favoritos</button>';
      
      echo '<form method="post" action="php/agregar-vistos.php">';
      echo '<input type="hidden" name="id_contenido" value="' . $fila["id_contenido"] . '" />';
      echo '<button type="submit" class="btn btn-secondary"><i class="fa-solid fa-eye" style="color: #d0d5dc;"></i> Ver</button>';
      echo '</form>';
      echo '</div>';
      generarEpisodios($fila);
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
  }
  

?>