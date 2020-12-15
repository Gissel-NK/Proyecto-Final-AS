<?php 
require_once "../BD/conexionBD.php";

$idUsuario=$_POST['idUsuario'];
$carnet=$_POST['carnet'];
$nombreUs=$_POST['nombreUs'];
$apellidoUs=$_POST['apellidoUs'];
$sexo=$_POST['sexo'];
$tipoUs=$_POST['tipoUs'];
if ($carnet!=null) {
	$consulta1="UPDATE usuarios SET idUsuario='".$idUsuario."', carnet='".$carnet."', nombreUs='".$nombreUs."', apellidoUs='".$apellidoUs."', sexo='".$sexo."', tipoUs='".$tipoUs."' WHERE idUsuario='".$idUsuario."'";
	if($mysqli->query($consulta1)){
	   echo '<script type="text/javascript">window.location.href="../reader-list.php";</script>'; 
		}else{
	    echo "ocurrio un error";
	}
}
	
 ?>