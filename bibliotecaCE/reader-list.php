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
	<title>Lista de lectores</title>

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
	<script src="./js/sweetalert2.min.js" ></script>

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

		<!-- Page content -->
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
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE LECTORES
				</h3>
			</div>

			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="reader-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR LECTOR</a>
					</li>
					<li>
						<a class="active" href="reader-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE LECTORES</a>
					</li>
				</ul>	
			</div>
			
			<!-- Content here-->
			<div class="container-fluid">
				<div class="table-responsive">
					<table class="table table-dark table-sm">
						<thead>
							<tr class="text-center roboto-medium">
								<th>#</th>
								<th>CARNET</th>
								<th>NOMBRE</th>
								<th>APELLIDO</th>
								<th>SEXO</th>
								<th>NIVEL</th>
								<th>ACTUALIZAR</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<?php
					        //Mostrar Usuarios
					        require_once "BD/conexionBD.php";
					
							$consulta="SELECT * FROM usuarios";
							$consulta2=$mysqli->query($consulta);
							while($row=$consulta2->fetch_array(MYSQLI_ASSOC)){
								$idUsuario = $row['idUsuario'];
								$carnet = $row['carnet'];
								$nombreUs = $row['nombreUs'];
								$apellidoUs = $row['apellidoUs'];
								$sexo = $row['sexo'];
								$tipoUs = $row['tipoUs'];
							?>
						<tr>
					     	<td> <?php echo $idUsuario; ?></td>
					     	<td> <?php echo $carnet; ?></td>
					     	<td> <?php echo $nombreUs; ?></td>
					     	<td> <?php echo $apellidoUs; ?></td>
					    	<td> 
					    		<?php 
					    		if ($sexo == 0) {
					    			echo "Masculino";
					    		}else{
					    			echo "Femenino";
					    		}
					    		?>	
					    	</td>
					     	<td>
					     		<?php 
					     		if ($tipoUs == 0) {
					     			echo "Docente";
					     		}elseif ($tipoUs == 1) {
					     			echo "Estudiante";
					     		}else{
					     			echo "Otro";
					     		}
					     		?>
					     			
					     	</td>
					     	<td>
							<?php 
							echo "<a href='reader-update.php?idUsuario=".$row['idUsuario']."'>"
							?>
							<i class="fas fa-sync-alt"></i>
							<?php 
							"</a>"
							?>	
							</td>
						</tr>
						<?php
						}
					    ?>
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

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>