<?php include '../extend/header.php';
$correo = $_SESSION['correo_user'];
$sel_des = $con->prepare("SELECT * FROM deseos WHERE correo = ? ORDER BY id DESC "); // trae los productos segun correo
 ?>

<div class="container" style="margin-top: 10%;">
	<h2 class="bg-primary text-white text-center" >Lista de favoritos</h2>
	<div class="row">
		<?php 
		$sel_des-> execute(array($correo));
		$sel = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE clave = ? ");//informacion inventario
		  	while ($f_des = $sel_des->fetch()) {
		  		$clave_producto = $f_des['clave_producto'];
		  		$sel->execute(array($clave_producto));
		  		if ($f = $sel -> fetch()) {
		  		}
		 ?>
		 <div class="col-md-6 col-sm-12 col-lg-3">
		 	<div class="card" style="margin-top: 1%;">
		 		<img class="card-img-top" src="../../virtux_admin/admin/<?php echo $f['foto'] ?>" width="200" height="200">
		 		<div class="card-body">
		 			<h4 class="card-title"><?php echo $f['producto'] ?></h4>
		 			<p class="card-text"><?php echo "$". number_format($f['precio'], 2) ?></p>
		 			<div class="row">
		 			<button type="button" class="btn btn-primary mr-5 ml-2" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>

		 			<form method="post" action="eliminar_favorito.php">
		 			<button type="submit" class="btn btn-danger text-white float-right" name="boton" value="<?php echo $f['clave'] ?>">Eliminar</button> 
		 			</form>
		 			</div> 
		 		</div>
		 	</div>
		 </div>
		<?php }
		$sel_des = null;
		$sel = null;
		$con = null
		 ?>
	</div>
</div>

<div class="modal fade modal_mas" tabindex="-1" role="dialog" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div id="res" ></div>
		</div>
	</div>
</div>

<?php include '../extend/footer.php'; ?>
<script src="../js/ver_mas.js" ></script>
</body>
</html>