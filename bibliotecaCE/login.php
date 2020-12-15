<?php

$usuario=$_POST['usuario'];
$clave=$_POST['contraseña'];
$consulta="SELECT idAdmin, usuario, Contraseña FROM administradores WHERE usuario='$usuario' AND contraseña='$clave'";
$consultaBD=$mysqli->query($consulta);
if($consultaBD->num_rows>=1){
    $row=$consultaBD->fetch_array(MYSQLI_ASSOC);
    session_start();
    $_SESSION['usuario']=$row['usuario'];
    $_SESSION['idAdmin']=$row['idAdmin'];
    $_SESSION['autenticar']=true;
    header("Location: home.php");
}else{
    echo '<script src="js/sweetalert.js"></script>';
}

?>
