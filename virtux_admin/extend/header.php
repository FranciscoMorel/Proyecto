<?php include '../conexion/conexion.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Ecommerce</title>
	<link rel="shortcut icon" href="../img/ellegal.png" />
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
     <style>
      	body{
      		display: flex;
    min-height: 100vh;
    flex-direction: column;
    background-image: url("../img/fondo.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
      	}
      </style>
</head>
<body class="bg-light" >

	<nav class="navbar navbar-expand-lg navbar-light bg-info">
		<a href="index.php" class="navbar-brand"><img src="../img/ellegal.png" height="80"></img></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
			<span class="navbar-toggler-icon" ></span>
		</button>

		<div class="collapse navbar-collapse" id="menu">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item mr-auto">
					<a href="../admin/inventario.php" class="nav-link">Inventario</a>
				</li>
				<li class="nav-item dropdown" >
					<a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorias</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a href="../admin/categorias.php?opc=GENERAL" class="dropdown-item">GENERAL</a>
						<a href="../admin/categorias.php?opc=TELEFONIA" class="dropdown-item">TELEFONIA</a>
						<a href="../admin/categorias.php?opc=COMPUTADORES" class="dropdown-item">COMPUTADORES Y NOTEBOOKS</a>
						<a href="../admin/categorias.php?opc=MONITORES" class="dropdown-item">MONITORES</a>
						<a href="../admin/categorias.php?opc=PROYECTORES" class="dropdown-item">PROYECTORES</a>
					</div>
				</li>
			</ul>
			
				<form class="form-inline my-2 my-lg-0" role="form" method="get" action="resultado.php">
            		<div >
              		<input type="text" placeholder="Ingrese su busqueda"  class="form-control" name="palabra"/>
              	</div>
            		<button type="submit" action="resultado.php"  class="btn btn-success mr-5 ml-1">Buscar</button>
 				</form>
			
			
			<button class="btn btn-dark" id="logout" >Cerrar sesion</button>
		
		</div>

	</nav>
	
