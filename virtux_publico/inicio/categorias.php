<?php

 include '../extend/header.php';
$opc =  htmlentities($_GET['opc']);
$sel = $con->prepare("select foto,precio,producto,clave from inventario where categoria = ? AND cantidad > 0");
?>
<div class="container" style="margin-top: 10%;">
	<h2 class="text-white text-center"><?php echo $opc ?></h2>
    <div class="row">
    	<?php   

    	 $sel ->execute(array($opc));
    	 while($f = $sel->fetch() ){
          ?>
    	 <div class="col-sm-12 col-md-6 col-lg-3">
    	 	<div class="card" style="margin-top: 1%";> 
    	 	    <img class="card-img-top" src="../../virtux_admin/admin/<?php echo$f['foto'] ?>" width="200" height="200">
    	 	    <div class="card-body">
    	 		   <h4 class="card-title"><?php echo $f['producto'] ?> </h4>
    	 		   <p class="card-text"><?php echo "$".number_format($f['precio']) ?></p>
    	 		    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal_mas" value="<?php echo $f['clave'] ?>" onclick="modal(this.value)">Ver mas...</button>
    	 		    <button class="btn btn-danger text-while float-right" onclick="enviar(this.value)" value="<?php echo$f['clave'] ?>"><i class="fa fa-heart"></i></button>
    	 	    </div>
    	    </div>
         </div>
	<?php  }
      $sel = null;
      $con = null;
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
<script src="../js/deseos.js"></script>
<script src="../js/ver_mas.js" ></script>

