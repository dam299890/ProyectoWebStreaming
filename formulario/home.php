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
  <title>Sky TV | Home</title>

  <script src="https://kit.fontawesome.com/9d3f093a67.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />

  <link rel="stylesheet" href="css/registro-2.css" />
  <link rel="stylesheet" href="css/home.css">
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
              <li>
                <hr class="dropdown-divider text-white">
              </li>
              <li><a class="dropdown-item text-white" href="configuracion.php">Configuración</a></li>
            </ul>
          </li>

        </ul>

        <form class="d-flex" role="search">
        
        <input class="bg-light rounded me-2" type="text" name="" onkeyup="myFunction()" id="peli" placeholder="Búsqueda" aria-label="Search"> <input class="btn btn-primary bg-light" type="button" value="Buscar" id="buscar">
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

                           
  <div id="contenido" class="mt-5 d-none">
  
        </div>
        <p id="disponible" class="text-center d-none text-white"></p>

  <!-- Carrusel principal -->
  <section id="carr-main" class="mb-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/matrix.jpg" class="d-block w-100" alt="como entrenar a tu dragon">
        </div>
        <div class="carousel-item">
          <img src="img/Drive.jpg" class="d-block w-100" alt="drive">
        </div>
        <div class="carousel-item">
          <img src="img/nowayhome.jpg" class="d-block w-100" alt="spiderman">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>


  <?php
          // Conectarse a la base de datos
          $conn = mysqli_connect("localhost", "root", "daniel123", "skytv", 8000);


          // Verificar la conexión
          if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
          }
          // Establecer el conjunto de caracteres utf8
          mysqli_set_charset($conn, "utf8");

          // Validar que la variable esté definida y no esté vacía
          if (isset($_GET['tipo'])) {
            $tipo = $_GET['tipo'];
            // Limpiar el valor de la variable
            $tipo_limpio = filter_var($tipo, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // limpiamos el valor de la variable $tipo

            $sql = "SELECT * FROM $tipo INNER JOIN contenido
                    ON $tipo.id_contenido=contenido.id_contenido
                    INNER JOIN ha_visto ON contenido.id_contenido=ha_visto.id_contenido
                    INNER JOIN cuenta ON ha_visto.id_cuenta=cuenta.id_cuenta
                     WHERE cuenta.id_cuenta='{$_SESSION["id_cuenta"]}'";

            $resultado = mysqli_query($conn, $sql);
          } else {
            // Consulta SQL para recuperar los datos de la tabla de películas

            $sql = "SELECT * FROM contenido INNER JOIN 
                    ha_visto ON contenido.id_contenido=ha_visto.id_contenido
                    INNER JOIN cuenta ON ha_visto.id_cuenta=cuenta.id_cuenta
                     WHERE cuenta.id_cuenta='{$_SESSION["id_cuenta"]}'";
            $resultado = mysqli_query($conn, $sql);
          }

          ?>

  <!-- Carrusel -->
  <div class="peliculas-recomendadas contenedor">

    <div class="contenedor-titulo-control">
      <h3 class="text-white">Seguir Viendo</h3>
      
      <div class="indicadores">
      </div>
    </div>
    <?php
    if (mysqli_num_rows($resultado) >= 0 and mysqli_num_rows($resultado) < 4 ) {



      echo '<div id="viendo" class="contenedor-principal">';
      echo '<button role="button" id="flecha-izquierda" class="flecha-izquierda d-none"><i class="fa-solid fa-chevron-left"></i></button>';
      echo '<div id="1" class="contenedor-carousel">';
        echo '<div class="carousel">';
      while ($fila = mysqli_fetch_assoc($resultado)) {
        generarPelicula($fila);
      }
      echo '</div>';
      echo '</div>';

      echo '<button role="button" id="flecha-derecha" class="flecha-derecha d-none"><i class="fa-solid fa-chevron-right"></i></span>';
      echo '  <span class="visually-hidden">siguiente</span></button>';
    echo '</div>';

    }elseif(mysqli_num_rows($resultado) > 3){
    // Cerrar la conexión a la base de datos


      
    echo '<div id="viendo" class="contenedor-principal">';
      echo '<button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fa-solid fa-chevron-left"></i></button>';
      echo '<div id="1" class="contenedor-carousel">';
        echo '<div class="carousel">';

        

          // Generar dinámicamente el código HTML para cada modal
          while ($fila = mysqli_fetch_assoc($resultado)) {
              generarPelicula($fila);
            }
         
          

        echo '</div>';
      echo '</div>';

      echo '<button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fa-solid fa-chevron-right"></i></span>';
      echo '  <span class="visually-hidden">siguiente</span></button>';
    echo '</div>';
  }
  // Cerrar la conexión a la base de datos
  mysqli_close($conn);

    ?>
  </div>


  <!-- Carrusel -->
  <div class="peliculas-recomendadas contenedor">

    <div class="contenedor-titulo-control">
      <h3 class="text-white">Acción</h3>
      <div class="indicadores">
      </div>
    </div>
    <div id="accion" class="contenedor-principal">
      <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fa-solid fa-chevron-left"></i></button>
      <div id="1" class="contenedor-carousel">
        <div class="carousel">
          <?php
          // Conectarse a la base de datos
          $conn = mysqli_connect("localhost", "root", "daniel123", "skytv", 8000);


          // Verificar la conexión
          if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
          }
          // Establecer el conjunto de caracteres utf8
          mysqli_set_charset($conn, "utf8");

          // Validar que la variable esté definida y no esté vacía
          if (isset($_GET['tipo'])) {
            $tipo = $_GET['tipo'];
            // Limpiar el valor de la variable
            $tipo_limpio = filter_var($tipo, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // limpiamos el valor de la variable $tipo

            $sql = "SELECT * FROM $tipo INNER JOIN contenido
                    ON $tipo.id_contenido=contenido.id_contenido
                    INNER JOIN pertenece_a ON contenido.id_contenido=pertenece_a.id_contenido
                    INNER JOIN genero ON pertenece_a.id_genero=genero.id_genero
                    WHERE genero.nombre='acción'";

            $resultado = mysqli_query($conn, $sql);
          } else {
            // Consulta SQL para recuperar los datos de la tabla de películas

            $sql = "SELECT * FROM contenido INNER JOIN 
                    pertenece_a ON contenido.id_contenido=pertenece_a.id_contenido
                    INNER JOIN genero ON pertenece_a.id_genero=genero.id_genero
                    WHERE genero.nombre='acción'";
            $resultado = mysqli_query($conn, $sql);
          }

          // Generar dinámicamente el código HTML para cada modal
          if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
              generarPelicula($fila);
            }
          }
          // Cerrar la conexión a la base de datos
          mysqli_close($conn);
          ?>

        </div>
      </div>

      <button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fa-solid fa-chevron-right"></i></span>
        <span class="visually-hidden">siguiente</span></button>
    </div>

  </div>




  <!-- Carrusel -->

  <div class="peliculas-recomendadas contenedor">

    <div class="contenedor-titulo-control">
      <h3 class="text-white">Comedia</h3>
      <div class="indicadores">

      </div>
    </div>
    <div id="accion" class="contenedor-principal">
      <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fa-solid fa-chevron-left"></i></button>
      <div id="2" class="contenedor-carousel">
        <div class="carousel">
          <?php
          // Conectarse a la base de datos
          $conn = mysqli_connect("localhost", "root", "daniel123", "skytv", 8000);


          // Verificar la conexión
          if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
          }
          // Establecer el conjunto de caracteres utf8
          mysqli_set_charset($conn, "utf8");

          // Validar que la variable esté definida y no esté vacía
          if (isset($_GET['tipo'])) {
            $tipo = $_GET['tipo'];
            // Limpiar el valor de la variable
            $tipo_limpio = filter_var($tipo, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // limpiamos el valor de la variable $tipo

            $sql = "SELECT * FROM $tipo INNER JOIN contenido
                    ON $tipo.id_contenido=contenido.id_contenido
                    INNER JOIN pertenece_a ON contenido.id_contenido=pertenece_a.id_contenido
                    INNER JOIN genero ON pertenece_a.id_genero=genero.id_genero
                    WHERE genero.nombre='comedia'";

            $resultado = mysqli_query($conn, $sql);
          } else {
            // Consulta SQL para recuperar los datos de la tabla de películas

            $sql = "SELECT * FROM contenido INNER JOIN 
                    pertenece_a ON contenido.id_contenido=pertenece_a.id_contenido
                    INNER JOIN genero ON pertenece_a.id_genero=genero.id_genero
                    WHERE genero.nombre='comedia'";
            $resultado = mysqli_query($conn, $sql);
          }

          // Generar dinámicamente el código HTML para cada modal
          if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
              generarPelicula($fila);
            }
          }
          // Cerrar la conexión a la base de datos
          mysqli_close($conn);
          ?>
        </div>
      </div>

      <button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fa-solid fa-chevron-right"></i></span>
        <span class="visually-hidden">siguiente</span></button>
    </div>

  </div>

  <!-- Carrusel -->

  <div class="peliculas-recomendadas contenedor">

    <div class="contenedor-titulo-control">
      <h3 class="text-white">Drama</h3>
      <div class="indicadores">
      </div>
    </div>
    <div class="contenedor-principal">
      <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fa-solid fa-chevron-left"></i></button>
      <div id="1" class="contenedor-carousel">
        <div class="carousel">
          <?php
          // Conectarse a la base de datos
          $conn = mysqli_connect("localhost", "root", "daniel123", "skytv", 8000);


          // Verificar la conexión
          if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
          }
          // Establecer el conjunto de caracteres utf8
          mysqli_set_charset($conn, "utf8");

          // Validar que la variable esté definida y no esté vacía
          if (isset($_GET['tipo'])) {
            $tipo = $_GET['tipo'];
            // Limpiar el valor de la variable
            $tipo_limpio = filter_var($tipo, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // limpiamos el valor de la variable $tipo

            $sql = "SELECT * FROM $tipo INNER JOIN contenido
                    ON $tipo.id_contenido=contenido.id_contenido
                    INNER JOIN pertenece_a ON contenido.id_contenido=pertenece_a.id_contenido
                    INNER JOIN genero ON pertenece_a.id_genero=genero.id_genero
                    WHERE genero.nombre='drama'";

            $resultado = mysqli_query($conn, $sql);
          } else {
            // Consulta SQL para recuperar los datos de la tabla de películas

            $sql = "SELECT * FROM contenido INNER JOIN 
                    pertenece_a ON contenido.id_contenido=pertenece_a.id_contenido
                    INNER JOIN genero ON pertenece_a.id_genero=genero.id_genero
                    WHERE genero.nombre='drama'";
            $resultado = mysqli_query($conn, $sql);
          }

          // Generar dinámicamente el código HTML para cada modal
          if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
              generarPelicula($fila);
            }
          }
          // Cerrar la conexión a la base de datos
          mysqli_close($conn);
          ?>

        </div>
      </div>

      <button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fa-solid fa-chevron-right"></i></span>
        <span class="visually-hidden">siguiente</span></button>
    </div>

  </div>



  <!-- Carrusel -->

  <div class="peliculas-recomendadas contenedor">

    <div class="contenedor-titulo-control">
      <h3 class="text-white">Ficción</h3>
      <div class="indicadores">
      </div>
    </div>
    <div class="contenedor-principal">
      <button role="button" id="flecha-izquierda" class="flecha-izquierda"><i class="fa-solid fa-chevron-left"></i></button>
      <div id="1" class="contenedor-carousel">
        <div class="carousel">
          <?php
          // Conectarse a la base de datos
          $conn = mysqli_connect("localhost", "root", "daniel123", "skytv", 8000);


          // Verificar la conexión
          if (!$conn) {
            die("Error de conexión: " . mysqli_connect_error());
          }
          // Establecer el conjunto de caracteres utf8
          mysqli_set_charset($conn, "utf8");

          // Validar que la variable esté definida y no esté vacía
          if (isset($_GET['tipo'])) {
            $tipo = $_GET['tipo'];
            // Limpiar el valor de la variable
            $tipo_limpio = filter_var($tipo, FILTER_SANITIZE_FULL_SPECIAL_CHARS); // limpiamos el valor de la variable $tipo

            $sql = "SELECT * FROM $tipo INNER JOIN contenido
                    ON $tipo.id_contenido=contenido.id_contenido
                    INNER JOIN pertenece_a ON contenido.id_contenido=pertenece_a.id_contenido
                    INNER JOIN genero ON pertenece_a.id_genero=genero.id_genero
                    WHERE genero.nombre='ficción'";

            $resultado = mysqli_query($conn, $sql);
          } else {
            // Consulta SQL para recuperar los datos de la tabla de películas

            $sql = "SELECT * FROM contenido INNER JOIN 
                    pertenece_a ON contenido.id_contenido=pertenece_a.id_contenido
                    INNER JOIN genero ON pertenece_a.id_genero=genero.id_genero
                    WHERE genero.nombre='ficción'";
            $resultado = mysqli_query($conn, $sql);
          }

          // Generar dinámicamente el código HTML para cada modal
          if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
              generarPelicula($fila);
            }
          }
          // Cerrar la conexión a la base de datos
          mysqli_close($conn);
          ?>
        </div>
      </div>
      <button role="button" id="flecha-derecha" class="flecha-derecha"><i class="fa-solid fa-chevron-right"></i></span>
        <span class="visually-hidden">siguiente</span></button>
    </div>

  </div>

  <br><br><br>

  </section>

  <script src="https://kit.fontawesome.com/9d3f093a67.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

  <script src="js/main.js"></script>
</body>

</html>