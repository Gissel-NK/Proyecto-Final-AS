<?php
require_once "../BD/conexionBD.php";

$fechaPrestamo=$_POST['fechaPrestamo'];
$fechaEntrega=$_POST['fechaEntrega'];
$estadoPrestamo=$_POST['estadoPrestamo'];
$idLibroPrestamo=$_POST['idLibroPrestamo']; 
$idUsuarioPrestamo=$_POST['idUsuarioPrestamo'];
$cantidad=$_POST['cantidad'];

session_start();
$admin=$_SESSION['idAdmin'];

if($idLibroPrestamo!=null){
	$con='INSERT INTO prestamos(fechaPrestamo, fechaEntrega, estadoPrestamo, idLibroPrestamo, idUsuarioPrestamo, cantidad, idAdminPrestamo)VALUES("'.$fechaPrestamo.'", "'.$fechaEntrega.'", "'.$estadoPrestamo.'", "'.$idLibroPrestamo.'", "'.$idUsuarioPrestamo.'", "'.$cantidad.'", "'.$admin.'")';
	
	if($mysqli->query($con)){
	  echo '<script type="text/javascript">window.location.href="../reservation-list.php";</script>'; 
		}else{
	    echo "ocurrio un error";
	}
}

?>