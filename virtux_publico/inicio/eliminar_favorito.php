<?php 
   include '../conexion/conexion.php';
   include '../extend/alertas.php';

   $clave_p = htmlentities($_POST['boton']);
   $correo = $_SESSION['correo_user'];

   if($correo == null){
      echo "<script> alert('No ha iniciado sesion')</script>";
   }else{
    
   	$sel = $con->prepare("SELECT id FROM deseos WHERE correo = ? AND clave_producto = ? ");
   $sel->execute(array($correo,$clave_p));
   $f = $sel->fetch();
   $id = $f['id'];


   $del = $con->prepare("DELETE FROM deseos WHERE id = ? AND correo = ?");
   $del->execute(array($id,$correo));
    
    header('location:deseos.php');
   $del = null;
   $sel = null;
   $con = null;
   } 
   //echo phpinfo(); 

  ?>