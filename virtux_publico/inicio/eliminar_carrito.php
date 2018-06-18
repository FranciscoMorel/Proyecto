<?php 
   include '../conexion/conexion.php';
   include '../extend/alertas.php';

   $clave_p = htmlentities($_POST['btnc']);
   $correo = $_SESSION['correo_user'];

   if($correo == null){
      echo "<script> alert('No ha iniciado sesion')</script>";
   }else{
    
   	$sel = $con->prepare("SELECT id FROM compras WHERE correo_usuario = ?  AND clave = ? ");
   $sel->execute(array($correo,$clave_p));
   $f = $sel->fetch();
   $id = $f['id'];


   $del = $con->prepare("DELETE FROM compras WHERE id = ? AND correo_usuario = ?");
   $del->execute(array($id,$correo));
    
    header('location:carrito.php');
   $del = null;
   $sel = null;
   $con = null;  
   } 
   //echo phpinfo(); 

  ?>