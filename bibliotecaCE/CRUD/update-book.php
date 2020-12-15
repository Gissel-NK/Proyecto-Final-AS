<?php
require_once "../BD/conexionBD.php";

$idLibro=$_POST['idLibro'];
$isbn=$_POST['isbn'];
$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$anioPublicacion=$_POST['anioPublicacion'];
$numEjemplares=$_POST['numEjemplares'];
$estado=$_POST['estado'];
$idCategoriaLibro=$_POST['idCategoriaLibro'];
$idEditorialLibro=$_POST['idEditorialLibro'];

session_start();
$admin=$_SESSION['idAdmin'];

if($idLibro!=null){
	$cons="UPDATE libros SET idLibro='".$idLibro."', isbn='".$isbn."', titulo='".$titulo."', autor='".$autor."', anioPublicacion='".$anioPublicacion."', numEjemplares='".$numEjemplares."', estado='".$estado."', idCategoriaLibro='".$idCategoriaLibro."', idEditorialLibro='".$idEditorialLibro."', idAdminLibro='".$admin."' WHERE idLibro='".$idLibro."'";
	if($mysqli->query($cons)){
	  echo '<script type="text/javascript">window.location.href="../book-list.php";</script>'; 
		}else{
	    echo "ocurrio un error";
	}
}

?>