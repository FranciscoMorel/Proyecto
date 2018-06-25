<?php 
include '../conexion/conexion.php';
include '../extend/header.php';

?>
<body body background="../img/fondo.png">

<div class="container" style="margin-top: 1%;">
  <h2 class="bg-info text-black text-center ">Productos encontrados</h2>
  <div class="row">


<?php
    $palabra = htmlentities($_GET['palabra']);


   if(!(empty($palabra))){
      $sel = $con->prepare("select foto,precio,producto,clave from inventario where producto like '%".$palabra."%' ");  
       $sel ->execute();
       $contador= $sel->rowcount();
       if($contador == 0){ ?>
        <h4 class="bg-info text-black text-center"> <?php echo "No se han contrado relaciones de productos"; ?></h4>
        <?php
        }else {  ?>
          <h4 class="bg-info text-black text-center"><?php echo "Se han encontrado ".$contador." productos" ?></h4>
          <div class="row col-sm-12 "  >

          <?php

       while($f = $sel->fetch() ){

             ?>


	  <td>
    	 <div class="col-sm-12 col-md-6 col-lg-3">
    	 	<div class="card" style="margin-top: 5%";> 
    	 	    <img class="card-img-top" src="../../virtux_admin/admin/<?php echo$f['foto'] ?>" width="200" height="200">
    	 	    <div class="card-body">
    	 		   <h4 class="card-title"><?php echo $f['producto'] ?> </h4>
    	 		   <p class="card-text"><?php echo "$".number_format($f['precio']) ?></p>
    	 		    <tr>
							  		<td><a href="agregar_imagenes.php?clave=<?php echo $f['clave'] ?>" class="btn btn-outline-success btn-sm"><span class="material-icons">add</span></a></td>
							  		<td><a href="editar_producto.php?clave=<?php echo $f['clave'] ?>" class="btn btn-outline-primary btn-sm"><span class="material-icons">edit</span></a></td>
							  		<td><a href="#" class="btn btn-outline-danger btn-sm" onclick="bootbox.confirm('Seguro que desea realizar esta accion', function(result){ if (result == true){ location.href='eliminar_producto.php?clave=<?php echo $f['clave'] ?>&foto=<?php echo $f['foto'] ?>&pag=inventario.php';} })"><span class="material-icons" >clear</span></a></td>
							  	
    	 		    	
    	 	    </div>
    	    </div>
         </div>
     </td>

	<?php  }
	}
}
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
