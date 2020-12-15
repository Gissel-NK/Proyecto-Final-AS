<?php 
require_once "../BD/conexionBD.php";

$idCategoria=$_POST['idCategoria'];
$categoria=$_POST['categoria'];
if ($categoria!=null) {
	$consulta1="UPDATE categorias SET idCategoria='".$idCategoria."', categoria='".$categoria."' WHERE idCategoria='".$idCategoria."'";
	if($mysqli->query($consulta1)){
	   echo '<script type="text/javascript">window.location.href="../category-list.php";</script>'; 
		}else{
	    echo "ocurrio un error";
	}
}
	
 ?>