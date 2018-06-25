<?php include '../extend/header.php'; 
include 'estrellas.php';
$clave = htmlentities($_GET['clave']);
$producto = htmlentities($_GET['producto']);
?>

<div class="container" style="margin-top: 1%;">
	<h1><?php echo $producto ?></h1>
	<hr>
	<?php 
	$sel_rating = $con->prepare("SELECT * FROM rating WHERE clave_producto = ?");
	$sel_rating->execute(array($clave));
	  	while ($f_rating = $sel_rating->fetch()) { 
	 ?>
	<div class="card text-dark bg-white">
			<div class="card-body">
				<div class="row">
					<div class="col-1"><img src="<?php echo $f_rating['foto'] ?>" width="50" height="50" class="rounded-circle"></div>
					<div class="col-11">
						<div class="row">
							<div class="col-10 text-left">
								<p class="font-weight-bold"><?php echo $f_rating['usuario'] ?>
								<span><?php echo estrellas($f_rating['rating']) ?></span>
								</p>
							</div>
							<div class="col-2 text-right">
								<p><?php echo $f_rating['fecha'] ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<p><?php echo $f_rating['comentario'] ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	 <?php 
	 	}
	  	$sel_rating = null;
	  	$con = null;
	  ?>
</div>

<?php include '../extend/footer.php'; ?>
</body>
</html>