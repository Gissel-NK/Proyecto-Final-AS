<?php

require_once "BD/conexionBD.php";

 $salida = "";

$query = "SELECT prestamos.idPrestamo, prestamos.idLibroPrestamo, libros.titulo, prestamos.idUsuarioPrestamo, usuarios.nombreUs, usuarios.apellidoUs, prestamos.fechaPrestamo, prestamos.fechaEntrega, prestamos.estadoPrestamo, prestamos.cantidad FROM prestamos INNER JOIN libros ON prestamos.idLibroPrestamo=libros.idLibro INNER JOIN usuarios ON prestamos.idUsuarioPrestamo=usuarios.idUsuario ORDER BY idLibro";        

if(isset($_POST['consulta'])){
    $q = $mysqli->real_escape_string($_POST['consulta']);
    $query = "SELECT prestamos.idPrestamo, prestamos.idLibroPrestamo, libros.titulo, prestamos.idUsuarioPrestamo, usuarios.nombreUs, usuarios.apellidoUs, prestamos.fechaPrestamo, prestamos.fechaEntrega, prestamos.estadoPrestamo, prestamos.cantidad FROM prestamos INNER JOIN libros ON prestamos.idLibroPrestamo=libros.idLibro INNER JOIN usuarios ON prestamos.idUsuarioPrestamo=usuarios.idUsuario WHERE titulo LIKE '%".$q."%' OR nombreUs LIKE '%".$q."%' OR apellidoUs LIKE '%".$q."%' OR fechaPrestamo LIKE '%".$q."%' OR fechaEntrega LIKE '%".$q."%'";
    
}

$resultado = $mysqli->query($query);

if($resultado->num_rows > 0){
    
    $salida.="<table class='table table-dark table-sm'>
                        <thead>
                            <tr class='text-center roboto-medium'>
                                <th>#</th>
                                <th>LIBRO</th>
                                <th>LECTOR</th>
                                <th>FECHA PRÉSTAMO</th>
                                <th>FECHA DEVOLUCIÓN</th>
                                <th>CANTIDAD</th>
                            </tr>
                        </thead>
                        <tbody>";
    
    while($fila = $resultado->fetch_assoc()){
        $salida.="<tr class='text-center'>
         <td>".$fila['idPrestamo']."</td>
        <td>".$fila['titulo']."</td>
        <td>".$fila['nombreUs']." ".$fila['apellidoUs']."</td>
        <td>".$fila['fechaPrestamo']."</td>
        <td>".$fila['fechaEntrega']."</td>
        <td>".$fila['cantidad']."</td>
        </tr>";
     
    }
    
    $salida.="</tbody></table>";
  
}else {
    $salida.="No hay ningun elemento que coincida con la busqueda";
    
}

    echo $salida;

    $mysqli->close();


?>
