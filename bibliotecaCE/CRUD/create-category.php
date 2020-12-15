<?php 
require_once "../BD/conexionBD.php";
$categoria=$_POST['categoria'];
if ($categoria!=null) {
	$consulta="INSERT INTO categorias(categoria)VALUES('".$categoria."')";
	if($mysqli->query($consulta)){
	   echo '<script type="text/javascript">window.location.href="../category-list.php";</script>'; 
		}else{
	    echo "ocurrio un error";
	}
}
	
 ?>