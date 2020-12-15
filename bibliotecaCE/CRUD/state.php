<?php 
require_once "../BD/conexionBD.php";

$idPrestamo=$_REQUEST['idPrestamo'];
    $consulta1="UPDATE prestamos SET estadoPrestamo = 0 WHERE idPrestamo='".$idPrestamo."'";
    if($mysqli->query($consulta1)){
       echo '<script type="text/javascript">window.location.href="../reservation-list.php";</script>'; 
        }else{
        echo "ocurrio un error";
    }

    
 ?>