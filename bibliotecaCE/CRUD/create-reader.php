<?php
require_once "../BD/conexionBD.php";

$carnet=$_POST['carnet'];
$nombreUs=$_POST['nombreUs'];
$apellidoUs=$_POST['apellidoUs'];
$sexo=$_POST['sexo'];
$tipoUs=$_POST['tipoUs'];

session_start();
$admin=$_SESSION['idAdmin'];

$consulta="INSERT INTO usuarios(carnet, nombreUs, apellidoUs, sexo, tipoUs)VALUES('".$carnet."','".$nombreUs."','".$apellidoUs."','".$sexo."','".$tipoUs."')";

if($mysqli->query($consulta)){
   echo '<script type="text/javascript">window.location.href="../reader-list.php";</script>'; 
}else{
    echo "ocurrio un error";
}


?>
