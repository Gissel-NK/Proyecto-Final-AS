<?php
require_once "../BD/conexionBD.php";

$DUI=$_POST['DUI'];
$adminNombre=$_POST['adminNombre'];
$adminApellido=$_POST['adminApellido'];
$fechaRegistro=$_POST['fechaRegistro'];
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
$nivelAdmin=$_POST['nivelAdmin'];

if($DUI!=null){
	$consulta='INSERT INTO administradores(DUI, adminNombre, adminApellido, fechaRegistro, usuario, contraseña, nivelAdmin)VALUES("'.$DUI.'","'.$adminNombre.'","'.$adminApellido.'","'.$fechaRegistro.'","'.$usuario.'","'.$contraseña.'","'.$nivelAdmin.'")';
	if($mysqli->query($consulta)){
	   echo '<script type="text/javascript">window.location.href="../admin-list.php";</script>'; 
		}else{
	    echo "ocurrio un error";
	}
}

?>