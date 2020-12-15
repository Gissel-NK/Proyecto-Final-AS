<?php
require_once "../BD/conexionBD.php";

$isbn=$_POST['isbn'];
$titulo=$_POST['titulo'];
$autor=$_POST['autor'];
$anioPublicacion=$_POST['anioPublicacion']; // No usar ñ por problemas,
$numEjemplares=$_POST['numEjemplares'];
$estado=$_POST['estado'];
$idCategoriaLibro=$_POST['idCategoriaLibro'];
$idEditorialLibro=$_POST['idEditorialLibro'];

//Imprimer las variables Ejem. $autor todas;
// Para comprobar q los datos estan llegando.
//echo $autor;
session_start();
$admin=$_SESSION['idAdmin'];

if($isbn!=null){
	$con='INSERT INTO libros(isbn, titulo, autor, anioPublicacion, numEjemplares, estado, idCategoriaLibro, idEditorialLibro, idAdminLibro)VALUES("'.$isbn.'", "'.$titulo.'", "'.$autor.'", "'.$anioPublicacion.'", "'.$numEjemplares.'", "'.$estado.'", "'.$idCategoriaLibro.'", "'.$idEditorialLibro.'", "'.$admin.'")';
	//revisar el orden del insert  Ej. Isbn es primero en el values (valorISBn) // seria el primero 
	// si el orden que se coloca no es el correcto dara error y no se insertaria la informacion.
	if($mysqli->query($con)){
	  echo '<script type="text/javascript">window.location.href="../book-list.php";</script>'; 
		}else{
	    echo "ocurrio un error";
	}
}

?>