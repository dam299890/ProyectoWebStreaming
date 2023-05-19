<?php
// Incluye el archivo de verificación de sesión
include('php/verificar-sesion.php');
include 'php/funciones-favoritos.php';

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sky TV | Categorías</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

  <link rel="stylesheet" href="css/registro-2.css" />
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/categoria.css">
</head>
<?php
echo "<script> const tarifa = '{$_SESSION["tarifa"]}';";
echo " const cuenta = '{$_SESSION["id_cuenta"]}';  </script>";
?>

<body>


  <nav class="navbar navbar-expand-lg sticky-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand border-0 ms-1 text-white" href="#">
        <img src="img/sky2.jpg" alt="Studio BAD DOG" /> TV</a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white border-0" aria-current="page" href="home.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white border-0 tarifa" href="tarifa.php">Tarifa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white border-0" href="home.php?tipo=serie">Series</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white border-0" href="home.php?tipo=pelicula">Películas</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorias
            </a>
            <ul class="dropdown-menu  text-white">
              <li><a class="dropdown-item text-white" href="#">Acción</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-white" href="#">Comedia</a></li>
              <li>
                <hr class="dropdown-divider text-white">
              </li>
              <li><a class="dropdown-item text-white" href="#">Drama</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-white" href="#">Ficción</a></li>
            </ul>
          </li>


          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white border-0 text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mi Espacio
            </a>
            <ul class="dropdown-menu  text-white">
              <li><a class="dropdown-item text-white" href="">Mis Favoritos</a></li>
              <li>
                <hr class="dropdown-divider text-white">
              </li>
              <li><a class="dropdown-item text-white" href="configuracion.php">Configuración</a></li>
            </ul>
          </li>

        </ul>

        <form class="d-flex" role="search">
        
        <input class="bg-light rounded me-2" type="text" name="" id="peli" onkeyup="myFunction()" placeholder="Búsqueda"> <input class="btn btn-primary bg-light" type="button" value="Buscar" id="buscar">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
        </form>
        <form action="php/logout.php" method="POST" id="logout-form">
          <ul class="navbar-nav mb-lg-0">
            <li class="nav-item">
              <button type="submit" class="btn nav-link active text-white border-0">Cerrar sesión</button>
            </li>
          </ul>
        </form>

        
      </div>
    </div>
  </nav>

                           
  <div id="contenido" class="mt-5">
  
        </div>
        <p id="disponible" class="text-center text-white"></p>
  <!-- Carrusel -->
  <div class="peliculas-recomendadas contenedor mt-5">

    <div class="contenedor-titulo-control">
      <h3 class="text-white">
        Favoritos
      </h3>
      <div class="indicadores">
      </div>
    </div>
    <section>

      <?php
      echo '<input type="hidden" id="tarifa" name="tarifa" value="' . $_SESSION['tarifa'] . '" />';
      echo '<button type="submit" class="btn btn-primary m-2 btn-lista" onclick="filtrarcontenido(0,' . $_SESSION['id_cuenta'] . ',' . $_SESSION['tarifa'] . '); cambiarBotonSeleccionado(this);">';
      echo ' Todo</button>';
      echo '<button type="submit" class="btn btn-secondary m-2 btn-lista" onclick="filtrarcontenido(\'serie\',' . $_SESSION['id_cuenta'] . ',' . $_SESSION['tarifa'] . '); cambiarBotonSeleccionado(this);">';
      echo ' Series</button>';
      echo '<button type="submit" class="btn btn-secondary m-2 btn-lista" onclick="filtrarcontenido(\'pelicula\',' . $_SESSION['id_cuenta'] . ',' . $_SESSION['tarifa'] . '); cambiarBotonSeleccionado(this);">';
      echo ' Peliculas</button>';
      ?>

    </section>
    <div class="contenedor-principal">
      <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fa-solid fa-chevron-left"></i></button>
      <div id="1" class="contenedor-carousel">
        <div id="resultado" class="carousel">


        </div>
      </div>

      <button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fa-solid fa-chevron-right"></i></span>
        <span class="visually-hidden">siguiente</span></button>
    </div>
  </div>
  <br><br><br>

  </section>
  <script src="https://kit.fontawesome.com/9d3f093a67.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"> </script>

  <script src="js/main.js"></script>

</body>

</html>