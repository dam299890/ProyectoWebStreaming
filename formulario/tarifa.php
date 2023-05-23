<?php
// Incluye el archivo de verificación de sesión
include('php/verificar-sesion.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Sign up-2</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/registro-2.css" />
	<link rel="stylesheet" href="css/home.css">
</head>

<body>



	<?php
	// Inicia sesión

	// Define una variable JavaScript con el valor de la variable de sesión 'tarifa'
	echo "<script> const tarifa = '{$_SESSION["tarifa"]}'; </script>";
	?>
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

	<div class="d-flex align-items-center vh-100 bg-image">
		<article class="col-12 col-sm-11 col-md-11 col-lg-8 col-xl-6 mx-auto">
			<a href="home.php">Atrás</a>
			<h1 class="text-center fs-3">ELIGE TU PLAN</h1>

			<form class="col-12" action="php/cambiar-tarifa.php" method="POST">
				<div class="plan d-flex flex-column flex-sm-column flex-lg-">
					<div class="form-check plan-option w-100 h-100">
						<label class="form-check-label" for="planGratis"> Gratis </label>
						<ul class="fs-6">
							<li>Series y peliculas hasta el 2018</li>
						</ul>
						<h3 class="fs-3">0.00 €/mes</h3>
						<input class="form-check-input" type="radio" name="tarifa" value="1" id="planGratis" <?php if ($_SESSION["tarifa"] == "1") echo "checked"; ?> />
					</div>
					<div class="form-check plan-option w-100 h-100">
						<label class="form-check-label" for="planRegular"> Regular</label>
						<ul class="fs-6">
							<li>Series y peliculas hasta el 2020</li>

						</ul>
						<h3 class="fs-3">8.99 €/mes</h3>
						<input class="form-check-input" type="radio" name="tarifa" value="2" id="planRegular" <?php if ($_SESSION["tarifa"] == "2") echo "checked"; ?> />
					</div>
					<div class="form-check plan-option w-100 h-100">
						<label class="form-check-label" for="planPremiun"> Premiun </label>
						<ul class="fs-6">
							<li>Series y peliculas hasta el 2022</li>
						</ul>
						<h3 class="fs-3">12.99 €/mes</h3>
						<input class="form-check-input" type="radio" name="tarifa" value="3" id="planPremiun" <?php if ($_SESSION["tarifa"] == "3") echo "checked"; ?> />
					</div>
				</div>
				<div class="d-grid gap-2 mt-2">
					<input type="hidden" name="_subject" value="Nueva suscripcion!!" />
					<input id="submitBtn" class="btn btn-primary btn-lg" type="submit" value="MODIFICAR TARIFA" />
				</div>
			</form>
		</article>
	</div>
	<script src="js/main.js"></script>
	<script src="js/sw.js"></script>
	<script src="js/app.js"></script>
	<script src="js/tarifa.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>