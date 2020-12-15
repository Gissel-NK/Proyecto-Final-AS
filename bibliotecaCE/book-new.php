<?php

session_start();

if(!$_SESSION['autenticar']){
    header("Location:index.php"); 
}
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Nuevo libro</title>

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
                    <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR LIBRO
                </h3>
            </div>
            <div class="container-fluid">
                <ul class="full-box list-unstyled page-nav-tabs">
                    <li>
                        <a class="active" href="book-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR LIBRO</a>
                    </li>
                    <li>
                        <a href="book-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE LIBROS</a>
                    </li>
                    <li>
                        <a href="book-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR LIBRO</a>
                    </li>
                </ul>
            </div>            
            <!--CONTENT-->
            <div class="container-fluid">
				<form action="CRUD/create-book.php" class="form-neon" method="POST" onsubmit="return validar();">
					<fieldset>
						<legend><i class="far fa-plus-square"></i> &nbsp; Información del Libro</legend>
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="isbn" class="bmd-label-floating">ISBN</label>
										<input type="text" pattern="[a-zA-Z0-9-]{1,45}" class="form-control" name="isbn" id="isbn" maxlength="45">
									</div>
								</div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="titulo" class="bmd-label-floating">Titulo</label>
										<input type="text" class="form-control" name="titulo" id="titulo" maxlength="140" required>
									</div>
								</div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="autor" class="bmd-label-floating">Autor</label>
                                        <input type="text" class="form-control" name="autor" id="autor" maxlength="140" required>
                                    </div>
                                </div>
								<div class="col-12 col-md-4">
									<div class="form-group">
										<label for="anioPublicacion" class="bmd-label-floating">Año de publicación</label>
										<input type="num" pattern="[0-9]{1,9}" class="form-control" name="anioPublicacion" id="anioPublicacion" maxlength="9" required>
									</div>
								</div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="numEjemplares" class="bmd-label-floating">Numero de ejemplares</label>
                                        <input type="num" pattern="[0-9]{1,9}" class="form-control" name="numEjemplares" id="numEjemplares" maxlength="9" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <label for="estado" class="bmd-label-floating">Estado</label>
                                        <select pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}" class="form-control" name="estado" id="estado" maxlength="140" required>
                                            <option value=""></option>
                                            <option value="0">Disponible</option>
                                            <option value="1">No Disponible</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="col-12 col-md-4">
                                           <?php
                                           require_once "BD/conexionBD.php";
                                                $consulta="SELECT * FROM categorias";
                                                $consulta2=$mysqli->query($consulta);
                                    
                                           ?>
                                    <div class="form-group">
                                        <label for="idCategoriaLibro" class="bmd-label-floating">Categoria</label>
                                        <select type="num" class="form-control" name="idCategoriaLibro" id="idCategoriaLibro" required>
                                            <option></option>
                                            <?php 
                                               
                                                while($row=$consulta2->fetch_array(MYSQLI_ASSOC)){
                                                    
                                                   echo "<option value=".$row['idCategoria'].">".$row['categoria']."
                                                </option>";
                                                }
                                                
                                            ?>
                                        </select>
                                        
                                    </div>

                                </div>
                                <br>
                                <div class="col-12 col-md-4">
                                     <?php
                                           require_once "BD/conexionBD.php";
                                                $consulta="SELECT * FROM editoriales";
                                                $consulta2=$mysqli->query($consulta);
                                    
                                           ?>
                                    <div class="form-group">
                                        <label for="idEditorialLibro" class="bmd-label-floating">Editorial</label>
                                        <select type="num" class="form-control" name="idEditorialLibro" id="idEditorialLibro" required>
                                            <option></option>
                                             <?php 
                                               
                                                while($row=$consulta2->fetch_array(MYSQLI_ASSOC)){
                                                    
                                                   echo "<option value=".$row['idEditorial'].">".$row['editorial']."
                                                </option>";
                                                }  
                                            ?>  
                                        </select>
                                    </div>
							</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp; GUARDAR</button>
					</p>
				</form>
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