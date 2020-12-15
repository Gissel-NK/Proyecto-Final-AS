<?php

require_once "BD/conexionBD.php";

 $salida = "";

$query = "SELECT libros.idLibro, libros.isbn, libros.titulo, libros.autor, libros.anioPublicacion, libros.numEjemplares, libros.estado, categorias.categoria, editoriales.editorial, libros.idAdminLibro FROM libros INNER JOIN categorias ON libros.idCategoriaLibro=categorias.idCategoria INNER JOIN editoriales on libros.idEditorialLibro=editoriales.idEditorial ORDER BY idLibro";        

if(isset($_POST['consulta'])){
    $q = $mysqli->real_escape_string($_POST['consulta']);
    $query = "SELECT libros.idLibro, libros.isbn, libros.titulo, libros.autor, libros.anioPublicacion, libros.numEjemplares, libros.estado, categorias.categoria, editoriales.editorial, libros.idAdminLibro FROM libros INNER JOIN categorias ON libros.idCategoriaLibro=categorias.idCategoria INNER JOIN editoriales on libros.idEditorialLibro=editoriales.idEditorial WHERE isbn LIKE '%".$q."%' OR titulo LIKE '%".$q."%' OR autor LIKE '%".$q."%' OR anioPublicacion LIKE '%".$q."%' OR categoria LIKE '%".$q."%' OR editorial LIKE '%".$q."%'";
    
}

$resultado = $mysqli->query($query);

if($resultado->num_rows > 0){
    
    $salida.="<table class='table table-dark table-sm'>
                        <thead>
                            <tr class='text-center roboto-medium'>
                                <th>#</th>
                                <th>ISBN</th>
                                <th>TITULO</th>
                                <th>AUTOR</th>
                                <th>PUBLICADO</th>
                                <th>EJEMPLARES</th>
                                <th>CATEGORIA</th>
                                <th>EDITORIAL</th>
                            </tr>
                        </thead>
                        <tbody>";
    
    while($fila = $resultado->fetch_assoc()){
        $salida.="<tr class='text-center'>
         <td>".$fila['idLibro']."</td>
        <td>".$fila['isbn']."</td>
        <td>".$fila['titulo']."</td>
        <td>".$fila['autor']."</td>
        <td>".$fila['anioPublicacion']."</td>
        <td>".$fila['numEjemplares']."</td>
        <td>".$fila['categoria']."</td>
        <td>".$fila['editorial']."</td>
        </tr>";
     
    }
    
    $salida.="</tbody></table>";
  
}else {
    $salida.="No hay ningun elemento que coincida con la busqueda";
    
}

    echo $salida;

    $mysqli->close();


?>
