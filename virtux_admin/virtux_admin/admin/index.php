<link rel="shortcut icon" href="../img/ellegal.png" /><!--icono de la pestaña-->
<style>
		body{
			display:flex;
			min-height: 100vh;
			flex-direction:column;
			background-image: url("../img/fon2.jpg");
			background-repeat: no-repeat; 
			background-size: cover;
			background-attachment: fixed;
		}
	</style>


<?php include '../extend/header.php'; 

$sel_ganado = $con->prepare("SELECT SUM(total) AS ganado FROM compras WHERE estatus_compra = 'COMPRADO' ");
$sel_ganado->execute();
if ($f_ganado = $sel_ganado->fetch()) { 
$ganado = $f_ganado['ganado'];
}
$sel_ganado = null;

$mes = date('Y-m');
$sel_mes = $con->prepare("SELECT SUM(total) AS ganado_mes FROM compras WHERE estatus_compra = 'COMPRADO' AND fecha LIKE ? ");
$sel_mes->execute(array("%$mes%"));
if ($f_mes = $sel_mes->fetch()) { 
$ganado_mes = $f_mes['ganado_mes'];
}
$sel_mes = null;


$hoy = date('Y-m-d');
$sel_hoy = $con->prepare("SELECT SUM(total) AS ganado_hoy FROM compras WHERE estatus_compra = 'COMPRADO' AND fecha LIKE ? ");
$sel_hoy->execute(array("%$hoy%"));
if ($f_hoy = $sel_hoy->fetch()) { 
$ganado_hoy = $f_hoy['ganado_hoy'];
}
$sel_hoy = null;


$sel_compras = $con->prepare("SELECT id FROM compras WHERE estatus_compra = 'COMPRADO' AND estatus_envio = 'POR ENVIAR' ");
$sel_compras->execute();
$row_compras = $sel_compras->rowCount();
$sel_compras = null;

$sel_enviados = $con->prepare("SELECT id FROM compras WHERE estatus_compra = 'COMPRADO' AND estatus_envio = 'ENVIADO' ");
$sel_enviados->execute();
$row_enviados = $sel_enviados->rowCount();
$sel_enviados = null;

$sel_entregado = $con->prepare("SELECT id FROM compras WHERE estatus_compra = 'COMPRADO' AND estatus_envio = 'ENTREGADO' ");
$sel_entregado->execute();
$row_entregado = $sel_entregado->rowCount();
$sel_entregado = null;


$sel_rating = $con->prepare("SELECT id FROM rating WHERE fecha = ? ");
$sel_rating->execute(array($hoy));
$row_rating = $sel_rating->rowCount();
$sel_rating = null;

$sel_inv = $con->prepare("SELECT id FROM inventario WHERE cantidad < 20 ");
$sel_inv->execute();
$row_inv = $sel_inv->rowCount();
$sel_inv = null;

$sel_usuarios = $con->prepare("SELECT id FROM usuarios ");
$sel_usuarios->execute();
$row_usuarios = $sel_usuarios->rowCount();
$sel_usuarios = null;

$con = null;

?>

<div class="container" style="margin-top: 6%;">
	<div class="row">
		<div class="col">
			<div class="card text-white bg-success mb-3" style="max-width: 20rem;">
					<div class="card-header">Total ganado</div>
					<div class="card-body">
						<h1 class="card-title text-center text-white"><?php echo "$". number_format($ganado, 2); ?></h1>
					</div>
				</div>
		</div>
		<div class="col">
			<div class="card text-white bg-info mb-3" style="max-width: 20rem;">
					<div class="card-header">Ganado en el mes</div>
					<div class="card-body">
					<a href="../reportes/reporte_ganado.php"><h1 class="card-title text-center text-white"><?php echo "$". number_format($ganado_mes, 2); ?></h1></a>
					</div>
				</div>
		</div>
		<div class="col">
			<div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
					<div class="card-header">Ganado hoy</div>
					<div class="card-body">
					<a href="../reportes/reporte_ganado.php"><h1 class="card-title text-center text-white"><?php echo "$". number_format($ganado_hoy, 2); ?></h1></a>
					</div>
				</div>
		</div>
	</div>

	<hr class="bg-info">
<div class="row">
	<div class="col">
		<div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
			<div class="card-header">Pedidos por enviar</div>
			<div class="card-body">
			<a href="../reportes/pedidos.php"><h1 class="card-title text-center text-white"><?php echo $row_compras; ?></h1></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
			<div class="card-header">Pedidos enviados</div>
			<div class="card-body">
			<a href="../reportes/enviados.php"><h1 class="card-title text-center text-white"><?php echo $row_enviados; ?></h1></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
			<div class="card-header">Pedidos entregados</div>
			<div class="card-body">
			<a href="../reportes/entregados.php"><h1 class="card-title text-center text-white"><?php echo $row_entregado; ?></h1></a>
			</div>
		</div>
	</div>
</div>
<hr class="bg-info">
<div class="row">
	<div class="col">
		<div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
			<div class="card-header">Reseñas de hoy</div>
			<div class="card-body">
			<a href="../reportes/resenas.php"><h1 class="card-title text-center text-white"><?php echo $row_rating; ?></h1></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
			<div class="card-header">Limite de inventario</div>
			<div class="card-body">
			<a href="reorden.php"><h1 class="card-title text-center text-white"><?php echo $row_inv; ?></h1></a>
			</div>
		</div>
	</div>
	<div class="col">
		<div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
			<div class="card-header">Usuarios</div>
			<div class="card-body">
			<h1 class="card-title text-center text-white"><?php echo $row_usuarios; ?></h1>
			</div>
		</div>
	</div>
</div>


</div>
s




<?php include '../extend/footer.php'; ?>

</body>
</html>