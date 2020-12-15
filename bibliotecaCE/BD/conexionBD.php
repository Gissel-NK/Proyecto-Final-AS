<?php

$mysqli=new mysqli("localhost", "root", "", "biblioteca");
if(mysqli_connect_errno()){
    echo "Proble al conectarse con la BD";
}

$mysqli->set_charset("utf8");

?>

