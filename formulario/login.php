

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Sky TV | Log in</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		
		<div class="d-flex align-items-center vh-100 bg-image">
			<article class="col-sm-8 col-sm-8 col-md-8 col-lg-4 mx-auto">
				<h1 class="text-center fs-4"><a class="navbar-brand border-0 ms-1 text-white" href="#">
                <img src="img/sky2.jpg" alt="Studio BAD DOG" /> TV</a></h1>
				<form class="col-12" action="php/validar-inicio.php" method="POST">
					<div class="mb-3">
					<label class="form-label" for="usuario"></label>
						<input
							class="form-control text-white"
							autocomplete="off"
							type="text"
							id="usuario"
							name="usuario"
							pattern="[A-Za-z0-9]+"
							title="No ingrese carácteres especiales"
							placeholder="Usuario"
							required
						/>
					</div>
					<div class="mb-3">
						<label for="contrasena" class="form-label"></label>
						<input
							type="password"
							id="contrasena"
							name="contrasena"
							class="form-control text-white"
							placeholder="Password"
							aria-labelledby="passwordHelpBlock"
							required
						/>
						<div id="passwordHelpBlock" class="form-text"></div>
					</div>
					<div class="mb-3 form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">Recuerdame</label>
					  </div>
					<div class="d-grid gap-2">
						<input type="hidden" name="_subject" value="Nuevo comentario!!" />
						<input class="btn btn-primary btn-lg" type="submit" value="CONECTAR"/>
						<!-- Mostrar el mensaje de error si existe -->
						<?php
      					 if(isset($_GET["error"]) && $_GET["error"] == 'true1')
      					 {
       					   echo "<div style='color:red'>Usuario no encontrado</div>";
       					 } if(isset($_GET["error"]) && $_GET["error"] == 'true2')
							{
							echo "<div style='color:red'>Contraseña invalida</div>";
							}
     					?>
					</div>
          <p>¿No tienes una cuenta?  <a href="registro.php">¡Regístrate!</a></p>
		  <a href="#">Recuperar contraseña</a>
				</form>
			</article>
		</section>
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
