<?php 
require_once "../BD/conexionBD.php";

$idEditorial=$_POST['idEditorial'];
$editorial=$_POST['editorial'];
if ($editorial!=null) {
	$consulta1="UPDATE editoriales SET idEditorial='".$idEditorial."', editorial='".$editorial."' WHERE idEditorial='".$idEditorial."'";
	if($mysqli->query($consulta1)){
	   echo '<script type="text/javascript">window.location.href="../publishing-house-list.php";</script>'; 
		}else{
	    echo "ocurrio un error";
	}
}
	
 ?>