<?php
// Inicia sesión
session_start();
// Incluye el archivo de verificación de sesión


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">	
	<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
			crossorigin="anonymous"
		/>
	<link href="https://vjs.zencdn.net/8.0.4/video-js.css" rel="stylesheet" />

	<script src="https://kit.fontawesome.com/9d3f093a67.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/video-js.css">
	<script src="js/video.js"></script>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
	<link rel="stylesheet" href="css/estilos.css">
	<title>Video.js</title>
</head>
<body>
<?php
// Verifica si el usuario ha iniciado sesión
   $id_contenido = $_SESSION["id_contenido"];
   include 'php\consulta-vistos.php';
?>
	
		
	</main>
	
	<script src="https://vjs.zencdn.net/8.0.4/video.min.js"></script>
	<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
			crossorigin="anonymous"
		></script>
	<script>
		var reproductor = videojs('fm-video', {
			fluid: true
		});
	</script>
</body>
</html>