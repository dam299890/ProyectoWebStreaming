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
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/registro-2.css" />
	</head>
	<body>

		<div class="d-flex align-items-center vh-100 bg-image">
			<article class="col-12 col-sm-11 col-md-11 col-lg-8 col-xl-6 mx-auto">
				<a href="registro.php">Atrás</a>
				<h1 class="text-center fs-3">ELIGE TU PLAN</h1>

				<form class="col-12" action="php/cambiar-tarifa.php" method="POST">
					<div class="plan d-flex flex-column flex-sm-column flex-lg-">
					<div class="form-check plan-option w-100 h-100">
						<label class="form-check-label" for="planGratis"> Gratis </label>
						<ul class="fs-6">
							<li>Series y peliculas hasta el 2018</li>
						</ul>
						<h3 class="fs-3">0.00 €/mes</h3>
						<input
							class="form-check-input"
							type="radio"
							name="tarifa"
							value="1"
							id="planGratis"
						/>
					</div>
					<div class="form-check plan-option w-100 h-100">
						<label class="form-check-label" for="planRegular"> Regular</label>
						<ul class="fs-6">
							<li>Series y peliculas hasta el 2020</li>

						</ul>
						<h3 class="fs-3">8.99 €/mes</h3>
						<input
							class="form-check-input"
							type="radio"
							name="tarifa"
							value="2"
							id="planRegular"
						/>
					</div>
					<div class="form-check plan-option w-100 h-100">
						<label class="form-check-label" for="planPremiun"> Premiun </label>
						<ul class="fs-6">
							<li>Series y peliculas hasta el 2022</li>
						</ul>
						<h3 class="fs-3">12.99 €/mes</h3>
						<input
							class="form-check-input"
							type="radio"
							name="tarifa"
							value="3"
							id="planPremiun"
							checked
						/>
					</div>
				</div>
				<div class="d-grid gap-2 mt-2">					
					<input class="btn btn-primary btn-lg" type="submit" value="SUSCRIBIRSE"/>
				</div>
				</form>
			</article>
		</div>
		<script src="js/sw.js"></script>
		<script src="js/app.js"></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
			crossorigin="anonymous"
		></script>
	</body>
</html>
