<?php 
require_once "../BD/conexionBD.php";
$editorial=$_POST['editorial'];
if ($editorial!=null) {
	$consulta="INSERT INTO editoriales(editorial)VALUES('".$editorial."')";
	if($mysqli->query($consulta)){
	   echo '<script type="text/javascript">window.location.href="../publishing-house-list.php";</script>'; 
		}else{
	    echo "ocurrio un error";
	}
}
	
 ?>