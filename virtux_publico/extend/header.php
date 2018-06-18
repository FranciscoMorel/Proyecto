<?php include '../conexion/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ecommerce</title>
	<link rel="shortcut icon" href="../img/ellegal.png" />
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
      	body{
      		display: flex;
    min-height: 100vh;
    flex-direction: column;
    background-image: url("../img/fondo4.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
      	}
      </style>

<script type="text/javascript">
	
      document.getElementById('buscar').value="";

</script>


</head>


	<nav class="navbar fixed-top navbar navbar-expand-lg navbar-light bg-primary">
		<a href="#" class="navbar-brand text-white"><img   src="../img/ellegal.png" height="80"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
			<span class="navbar-toggler-icon" ></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item mr-auto">
					<a href="../inicio/index.php" class="nav-link text-white">Inicio</a>
				</li>
				<li class="nav-item dropdown" >
					<a href="#" class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a href="../inicio/categorias.php?opc=TELEFONIA" class="dropdown-item">TELEFONIA</a>
						<a href="../inicio/categorias.php?opc=MONITORES" class="dropdown-item">MONITORES</a>
						<a href="../inicio/categorias.php?opc=COMPUTADORES" class="dropdown-item">COMPUTADORES y NOTEBOOK</a>
						<a href="../inicio/categorias.php?opc=PROYECTORES" class="dropdown-item">PROYECTORES</a>
					</div>
				</li>
			</ul>

			<div>
				<form class="navbar-form navbar-right collapse navbar-collapse" role="form" method="get" action="resultado.php">
            		<div >
              		<input type="text" required placeholder="Ingrese su busqueda" id="buscar" class="form-control mr-3" name="palabra"  /></div>
              		
            		<button type="submit" action="resultado.php"  class="btn btn-success ml-1">Buscar</button>
 				</form>
			</div>

			<?php 
			$correo = $_SESSION['correo_user'];
			$sel_carrito = $con->prepare("SELECT id FROM compras WHERE correo_usuario = ? AND estatus_compra = 'AGREGADO' ");
			$sel_carrito->execute(array($correo));
			$carrito = $sel_carrito->rowCount();
			$sel_carrito = null;
			 ?>
			 <?php if ($carrito >0 ): ?>
				<a href="carrito.php" class="nav-link text-white"><i class="fa fa-shopping-cart fa-2x"></i> <span class="badge badge-danger"><?php echo $carrito ?></span></a>
			 <?php else: ?>
				<a href="carrito.php" class="nav-link text-white"><i class="fa fa-shopping-cart fa-2x"></i></a>
			 <?php endif ?>
			
			

			<div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle text-white" id="perfil" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<h4><?php echo $_SESSION['name'] ?></h4>
				</a>
				<div class="dropdown-menu" aria-labelledby="perfil">
						<a href="deseos.php" class="dropdown-item">Favoritos</a>
						<a href="compras.php" class="dropdown-item">Compras</a>
						<a href="#" class="dropdown-item" id="logout">Cerrar sesion</a>
					</div>
			</div>



		</div>
	</nav>

	
	