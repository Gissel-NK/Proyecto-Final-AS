<?php 
session_start();
if (!isset($_SESSION['autenticar'])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Lista de libros</title>

    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="./css/normalize.css">

    <!-- Bootstrap V4.3 -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Bootstrap Material Design V4.0 -->
    <link rel="stylesheet" href="./css/bootstrap-material-design.min.css">

    <!-- Font Awesome V5.9.0 -->
    <link rel="stylesheet" href="./css/all.css">

    <!-- Sweet Alerts V8.13.0 CSS file -->
    <link rel="stylesheet" href="./css/sweetalert2.min.css">

    <!-- Sweet Alert V8.13.0 JS file-->
    <script src="./js/sweetalert2.min.js"></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">

    <!-- General Styles -->
    <link rel="stylesheet" href="./css/style.css">


</head>


<body>
    <!-- Main container -->
    <main class="full-box main-container">
        <!-- Nav lateral -->
        <section class="full-box nav-lateral">
            <div class="full-box nav-lateral-bg show-nav-lateral"></div>
            <div class="full-box nav-lateral-content">
                <figure class="full-box nav-lateral-avatar">
                    <i class="far fa-times-circle show-nav-lateral"></i>
                    <img src="./assets/img/logo_ce.jpg" class="img-fluid" alt="Avatar">
                </figure>
                <div class="full-box nav-lateral-bar"></div>
               <!--- menu -->
            <?php 
            Include "menu.php";

             ?>
            </div>
        </section>
        <section class="full-box page-content">
            <nav class="full-box navbar-info">
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="#">
                    <!--Imprime el nombre del administrador-->
                    <strong>
                        <?php 
                         echo $_SESSION['usuario'];
                        ?>
                    </strong>
                    <i class="fas fa-user-cog"></i>
                </a>
                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i>
                </a>
            </nav>
            <!-- Page header -->
            <div class="full-box page-header">
                <h3 class="text-left">
                    <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE LIBROS
                </h3>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a href="book-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR LIBRO</a>
                    </li>
                    <li>
                        <a class="active" href="book-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE LIBROS</a>
                    </li>
                    <li>
                        <a href="book-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR LIBRO</a>
                    </li>
                </ul>
            </div>
            
            <!--CONTENT-->
           <div class="container-fluid">
                <div class="table-responsive">
                    <?php
                    require_once "BD/conexionBD.php";
                    $sql='SELECT libros.idLibro, libros.isbn, libros.titulo, libros.autor, libros.anioPublicacion, libros.numEjemplares, libros.estado, categorias.categoria, editoriales.editorial, libros.idAdminLibro FROM libros INNER JOIN categorias ON libros.idCategoriaLibro=categorias.idCategoria INNER JOIN editoriales on libros.idEditorialLibro=editoriales.idEditorial ORDER BY libros.idLibro';
                    $resultado=$mysqli->query($sql);
                    ?>
                    <table class="table table-dark table-sm">
                        <thead>
                            <tr class="text-center roboto-medium">
                                <th>#</th>
                                <th>ISBN</th>
                                <th>TITULO</th>
                                <th>AUTOR</th>
                                <th>AÑO DE PUBLICACIÓN</th>
                                <th>EJEMPLARES</th>
                                <th>ESTADO</th>
                                <th>CATEGORIA</th>
                                <th>EDITORIAL</th>
                                <th>ACTUALIZAR</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                            while ($row=$resultado->fetch_array(MYSQLI_ASSOC)) {
                            
                            ?>
                            <tr class="text-center" >
                                <td><?php echo $row['idLibro']?></td>
                                <td><?php echo $row['isbn']?></td>
                                <td><?php echo $row['titulo']?></td>
                                <td><?php echo $row['autor']?></td>
                                <td><?php echo $row['anioPublicacion']?></td>
                                <td><?php echo $row['numEjemplares']?></td>
                                <td>
                                    <option value="<?php echo $row['estado']?>">
                                        <?php
                                        if ($row['estado']==0) {
                                            echo "Disponible";
                                        }else{
                                            echo "No Disponible";
                                        }
                                        ?>
                                </td>
                                <td><?php echo $row['categoria']?></td>
                                <td><?php echo $row['editorial']?></td>
                            <td>
                            <a href="book-update.php?idLibro=<?php echo $row['idLibro']?>">
                            <i class="fas fa-sync-alt"></i>
                            </a>    
                            </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previo</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Siguiente</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>

    </main>
    
        
    <!--=============================================
    =            Include JavaScript files           =
    ==============================================-->
    <!-- jQuery V3.4.1 -->
    <script src="./js/jquery-3.4.1.min.js" ></script>

    <!-- popper -->
    <script src="./js/popper.min.js" ></script>

    <!-- Bootstrap V4.3 -->
    <script src="./js/bootstrap.min.js" ></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <script src="./js/jquery.mCustomScrollbar.concat.min.js" ></script>

    <!-- Bootstrap Material Design V4.0 -->
    <script src="./js/bootstrap-material-design.min.js" ></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>

    <script src="./js/main.js" ></script>
</body>
</html>