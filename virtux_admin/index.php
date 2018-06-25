<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ecommerce</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<style>
		body{
			display:flex;
			min-height: 100vh;
			flex-direction:column;
			background-image: url("img/fondo1.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			background-attachment: fixed;
		}
	</style>
	<link rel="shortcut icon" href="img/ellegal.png" /><!---icono de la pestaña-->
</head>
<body class="bg-light" >
	<nav class="navbar navbar-expand-lg navbar-light bg-info">
		<a href="#" class="navbar-brand mx-auto"><img src="img/ellegal.png" height="80"></a>
	</nav>

	<div class="container mx-auto" style="margin-top: 15%; width: 40rem;">
		<div class="well">
			<h1 class="bg-info text-white text-center" >Inicio de sesión</h1>
			<div class="form-group">
				<input type="email" id="correo"  class="form-control form-control-lg" placeholder="Correo" requiered>
			</div>
			<div class="form-group" >
				<input type="password" id="pass" class="form-control form-control-lg" placeholder="Contraseña" required >
			</div>
			<button type="submit" class="btn btn-primary" id="login">ENTRAR</button>
		</div>
	</div>
<?php include 'extend/footer.php'; ?>
<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>

<script src="js/app.js"></script>
</body>
</html>
