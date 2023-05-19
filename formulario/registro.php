<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Sky TV | Sign in</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<div class="d-flex align-items-center h-100 bg-image">
		
			<article class="col-sm-8 col-sm-8 col-md-8 col-lg-6 mx-auto">
			<h1 class="text-center fs-4"><a class="navbar-brand border-0 ms-1 text-white" href="#">
                <img src="img/sky2.jpg" alt="SkyTV" /> TV</a></h1>
				<form class="row" action="php/validar-registro.php" method="POST">
					
				<div class="col-md-6">
						<label class="form-label" for="name"></label>
						<input
							class="form-control text-white"
							type="text"
							id="name"
							name="name"
							pattern="[A-Za-z]+"
							title="No ingrese carácteres especiales"
							placeholder="Nombre"
							required
						/>
					</div>
					<div class="col-md-6">
						<label class="form-label" for="telefono"></label>
						<input
							class="form-control text-white"
							type="tel"
							id="telefono"
							name="telefono"
							pattern="[0-9]+"
							title="Ingrese solo números"
							placeholder="Telefono"
							required
						/>
					</div>
					<div class="col-md-6">
						<label class="form-label" for="dni"></label>
						<input
							class="form-control text-white"
							type="text"
							id="dni"
							name="dni"
							pattern="[A-Za-z0-9]+"
							title="No ingrese carácteres especiales"
							placeholder="DNI"
							required
						/>
					</div>
					<div class="col-md-6">
						<label class="form-label" for="fecha"></label>
						<input
							class="form-control text-white"
							type="date"
							id="fecha"
							name="fecha"
							pattern="[0-9]+"
							title="No ingrese carácteres especiales"
							placeholder="fecha"
							
							required
						/>
					</div>
					<div class="col-12">
						<label class="form-label" for="direccion"></label>
						<input
							class="form-control text-white"
							type="text"
							id="direccion"
							name="direccion"
							title="No ingrese carácteres especiales"
							placeholder="Dirección"
							required
						/>
					</div>
					<div class="col-md-6">
						<label class="form-label" for="nacionalidad"></label>
						<input
							class="form-control text-white"
							type="text"
							id="nacionalidad"
							name="nacionalidad"
							pattern="[A-Za-z]+"
							title="No ingrese carácteres especiales"
							placeholder="Nacionalidad"
							required
						/>
					</div>
					

					
					<div class="col-md-6">
						<label class="form-label" for="num_cuenta"></label>
						<input
							class="form-control text-white"
							type="number"
							id="num_cuenta"
							name="num_cuenta"
							pattern="[A-Za-z0-9]+"
							title="No ingrese carácteres especiales"
							placeholder="Número de Cuenta"
							
						/>
					</div><div class="col-md-6">
						<label class="form-label" for="num_tarjeta"></label>
						<input
							class="form-control text-white"
							type="number"
							id="num_tarjeta"
							name="num_tarjeta"
							pattern="[A-Za-z0-9]+"
							title="No ingrese carácteres especiales"
							placeholder="Número de Tarjeta"
							
						/>
					</div>

					<div class="col-md-6">
						<label class="form-label" for="email"></label>
						<input type="email" class="form-control text-white" id="email" name="email" required placeholder="Email" />
					</div>
					<div class="mb-4 col-md-6">
						<label class="form-label" for="usuario"></label>
						<input
							class="form-control text-white"
							autocomplete="off"
							type="text"
							id="usuario"
							name="usuario"
							pattern="[A-Za-z0-9]+"
							title="No ingrese carácteres especiales"
							placeholder="Nombre de Usuario"
							required
						/>
					</div>
					<div class="mb-4 col-md-6">
						<label for="contrasena" class="form-label"></label>
						<input
							type="password"
							id="contrasena"
							class="form-control text-white"
							name="contrasena"
							placeholder="Password"
							aria-labelledby="passwordHelpBlock"
							required
						/>
						<div id="passwordHelpBlock" class="form-text"></div>
					</div>
					
					<div class="d-grid gap-2 w-100">
						<input type="hidden" name="_subject" value="Nuevo comentario!!" />
						<input class="btn btn-primary btn-lg" type="submit" value="REGISTRAR"/>
						<!-- Mostrar el mensaje de error si existe -->
						<?php
      					 if(isset($_GET["error"]) && $_GET["error"] == 'true')
      					 {
						
       					   echo "<div style='color:red'>El correo ya esta en uso</div>";
       						}
     					?>					
					</div>
          <p>¿Ya tienes una cuenta?  <a href="login.php">¡Conéctate!</a></p>
		  
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
