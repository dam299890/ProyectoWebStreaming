<?php
// Incluye el archivo de verificación de sesión
include('php/verificar-sesion.php');
include 'php/funciones-home.php';
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Sky TV | Configuración</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
			crossorigin="anonymous"
		/>
  

        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/configuracion.css">
	</head>
  
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
                    <ul class="dropdown-menu  text-white categorias">
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
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-white" href="#">Aventura</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-white" href="#">Romántico</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-white" href="#">Suspenso</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-white" href="#">Fantasia</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-white" href="#">Animación</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-white" href="#">Terror</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-white" href="#">Misterio</a></li>
            </ul>
                  </li>

                  
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white border-0 text-capitalize" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mi Espacio
                    </a>
                    <ul class="dropdown-menu  text-white">
                    <li><a class="dropdown-item text-white" href="favoritos.php">Mis Favoritos</a></li>
                      <li><hr class="dropdown-divider text-white"></li>
                      <li><a class="dropdown-item text-white" href="configuracion.php">Configuración</a></li>
                    </ul>
                  </li>
                
                </ul>
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

          <!-- Configuracion -->
        <section class="informacion text-white p-5">
        <h1 class="fs-3">Cuenta </h1>
        
        <hr>
        <?php
// Incluye el archivo de verificación de sesión
include 'php\consultar-informacion-personal.php';

?>
<p class="fs-6">Miembro desde <?php
                      echo $informacion['fecha_alta'] ;
                      ?></p></p>
        <article>
          <h2 class="fs-5">INFORMACIÓN DEL PLAN</h2>
          <p class="fs-6">Plan: <?php
                      echo $_SESSION["tarifa"] ;
                      ?></p>
          <a class="fs-6" href="tarifa.php">Cambiar plan</a>
        </article>
        </section>
    <script src="https://kit.fontawesome.com/9d3f093a67.js" crossorigin="anonymous"></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
			crossorigin="anonymous"
		></script>

    <script src="js/main.js"></script>
	</body>
</html>
