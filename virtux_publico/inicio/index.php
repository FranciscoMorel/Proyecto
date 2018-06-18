<?php include '../extend/header.php'; 

?>

<style>
    .heading { color: #FF0000; }
    
  </style>


<div class="container" style="margin-top: 10%;">
	<h2 class=" text-white text-center ">TELEFONIA</h2>
	<div class="row">
		<?php 
		$sel_moda = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE categoria = 'TELEFONIA' AND cantidad > 0 ORDER BY id DESC LIMIT 4 ");
		$sel_moda->execute();
		  	while ($f_moda = $sel_moda->fetch()) {
		 ?>
		 <div class="col-md-6 col-sm-12 col-lg-3">
		 	<div class="card" style="margin-top: 1%;">
		 		<img class="card-img-top" src="../../virtux_admin/admin/<?php echo $f_moda['foto'] ?>" width="200" height="200">
		 		<div class="card-body">
		 			<h4 class="card-title"><?php echo $f_moda['producto'] ?></h4>
		 			<p class="card-text"><?php echo "$". number_format($f_moda['precio'], 2) ?></p>
		 			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f_moda['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>
		 			<button class="btn btn-danger text-white float-right" onclick="enviar(this.value)" value="<?php echo $f_moda['clave'] ?>"><i class="fa fa-heart"></i></button>
		 		</div>
		 	</div>
		 </div>
		<?php }
		$sel_moda = null;
		 ?>
	</div>
</div>

<hr>
<div class="container" style="margin-top: 3%;">
	<h2 class=" text-white text-center">COMPUTADORES Y NOTEBOOK</h2>
	<div class="row">
		<?php $sel_elec = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE categoria = 'COMPUTADORES' AND cantidad > 0 ORDER BY id DESC LIMIT 4");
		$sel_elec->execute();
		  	while ($f_elec = $sel_elec->fetch()) { ?>
		<div class="col-md-6 col-sm-12 col-lg-3" style="margin-top: 1%;">
			<div class="card" style="width: 100%;">
			  <img class="card-img-top" src="../../virtux_admin/admin/<?php echo $f_elec['foto'] ?>" width="200" height="200" >
			  <div class="card-body">
			    <h4 class="card-title"><?php echo $f_elec['producto'] ?></h4>
			    <p class="card-text"><?php echo "$". number_format($f_elec['precio'], 2) ?></p>
			    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f_elec['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>
			    <button class="btn btn-danger text-white float-right"  onclick="enviar(this.value)" value="<?php echo $f_elec['clave'] ?>"><i class="fa fa-heart"></i></button>
			  </div>
			</div>
		</div>
		<?php }
		$sel_moda = null;
		 ?>
	</div>
</div>
<hr>

<div class="container" style="margin-top: 3%;">
	<h2 class=" text-white text-center">MONITORES</h2>
	<div class="row">
		<?php $sel_joy = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE categoria = 'MONITORES' AND cantidad > 0 ORDER BY id DESC LIMIT 4");
		$sel_joy->execute();
		  	while ($f_joy = $sel_joy->fetch()) { ?>
		<div class="col-md-6 col-sm-12 col-lg-3" style="margin-top: 1%;">
			<div class="card" style="width: 100%;">
			  <img class="card-img-top" src="../../virtux_admin/admin/<?php echo $f_joy['foto'] ?>" width="200" height="200" >
			  <div class="card-body">
			    <h4 class="card-title"><?php echo $f_joy['producto'] ?></h4>
			    <p class="card-text"><?php echo "$". number_format($f_joy['precio'], 2) ?></p>
			    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f_joy['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>	
			    <button class="btn btn-danger text-white float-right"  onclick="enviar(this.value)" value="<?php echo $f_joy['clave'] ?>"><i class="fa fa-heart"></i></button>
			  </div>
			</div>
		</div>
		<?php }
		$sel_moda = null;
		 ?>
	</div>
</div>

<hr>

<div class="container" style="margin-top: 3%;">
	<h2 class=" text-white text-center">PROYECTORES</h2>
	<div class="row">
		<?php $sel_rel = $con->prepare("SELECT foto, precio, producto, clave FROM inventario WHERE categoria = 'PROYECTORES' AND cantidad > 0 ORDER BY id DESC LIMIT 4");
		$sel_rel->execute();
		  	while ($f_rel = $sel_rel->fetch()) { ?>
		<div class="col-md-6 col-sm-12 col-lg-3" style="margin-top: 1%;">
			<div class="card" style="width: 100%;">
			  <img class="card-img-top" src="../../virtux_admin/admin/<?php echo $f_rel['foto'] ?>" width="200" height="200" >
			  <div class="card-body">
			    <h4 class="card-title"><?php echo $f_rel['producto'] ?></h4>
			    <p class="card-text"><?php echo "$". number_format($f_rel['precio'], 2) ?></p>
			    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f_rel['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>	
			    <button class="btn btn-danger text-white float-right"  onclick="enviar(this.value)" value="<?php echo $f_rel['clave'] ?>"><i class="fa fa-heart"></i></button>
			  </div>
			</div>
		</div>
		<?php }
		$sel_moda = null;
		 ?>
	</div>
</div>
<hr>



<div class="modal fade modal_mas" tabindex="-1" role="dialog" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div id="res" ></div>
		</div>
	</div>
</div>


<?php include '../extend/footer.php'; ?>
<script src="../js/deseos.js"></script>
<script src="../js/ver_mas.js" ></script>
</body>
</html>