<?php 
include '../conexion/conexion.php';
$nombre = htmlentities($_GET['name']);
$correo = htmlentities($_GET['correo']);
$foto = htmlentities($_GET['foto']);
$red = htmlentities($_GET['red']);
if ($red == 'Facebook') {
	$oe = htmlentities($_GET['oe']);
	$foto = $foto.'&oe='.$oe;
}

$_SESSION['name'] = $nombre;
$_SESSION['correo_user'] = $correo;
$_SESSION['foto_user'] = $foto;

$sel = $con->prepare("SELECT id, clave FROM usuarios WHERE correo = ?");
$sel->execute(array($correo));
$row = $sel -> rowCount();

if ($row == 0) {
	$clave = sha1(rand(0000,9999).rand(00,99));
	$ins = $con->prepare("INSERT INTO usuarios VALUES (DEFAULT, :clave, :nombre, :correo, :foto)");
	    $ins->bindparam(':clave', $clave);
	    $ins->bindparam(':nombre', $nombre);
	    $ins->bindparam(':correo', $correo);
	    $ins->bindparam(':foto', $foto);
	    $ins->execute();
	    $ins = null;	


	    
}else{
	if ($f = $sel->fetch()) {
		$clave = $f['clave'];
	}
}

$sel = null;
$_SESSION['clave_user'] = $clave;
$con = null;
header("location:../inicio");
  


 ?>