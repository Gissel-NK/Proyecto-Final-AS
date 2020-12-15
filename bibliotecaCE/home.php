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
	<title>Home</title>

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
				<nav class="full-box nav-lateral-menu">
					<ul>
						<li>
							<a href="home.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Tablero
							</a>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Lectores <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="reader-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Lector</a>
								</li>
								<li>
									<a href="reader-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Lectores</a>
								</li>

							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-book"></i> &nbsp; Libros <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="book-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar Libro</a>
								</li>
								<li>
									<a href="book-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Libros</a>
								</li>
								<li>
									<a href="book-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar Libro</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-book-open"></i> &nbsp; Préstamos <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="reservation-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo préstamo</a>
								</li>
								<li>
									<a href="reservation-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de préstamos</a>
								</li>
								<li>
									<a href="reservation-search.php"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar préstamos</a>
								</li>
								<li>
									<a href="reservation-pending.php"><i class="fab fa-leanpub"></i> &nbsp; Préstamos pendientes</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas  fa-user-secret fa-fw"></i> &nbsp; Administrador <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="admin-new.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Nuevo Administrador</a>
								</li>
								<li>
									<a href="admin-list.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Administradores</a>
								</li>
							</ul>
						</li>

						<li>
							<a href="#" class="nav-btn-submenu"><i class="fas fa-tasks"></i> &nbsp; Otros <i class="fas fa-chevron-down"></i></a>
							<ul>
								<li>
									<a href="category-list.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Categorias</a>
								</li>
								<li>
									<a href="publishing-house-list.php"><i class="fas fa-plus fa-fw"></i> &nbsp; Editoriales</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
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
				<!--Boton ce cerrar sesion-->
				<a href="#" class="btn-exit-system">
					<i class="fas fa-power-off"></i>
				</a>
			</nav>

			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fab fa-dashcube fa-fw"></i> &nbsp; BIBLIOTECA ESCOLAR
				</h3>
				<p class="text-justify">
					La biblioteca escolar ofrece servicios de aprendizaje, libros y otros recursos, a todos los miembros de la comunidad escolar para que desarrollen el pensamiento critico y utilicen de manera eficaz la información en cualquier soporte y formato.
				</p>
			</div>
			
			<!-- Content -->
			<div class="full-box tile-container">

				<a href="reader-list.php" class="tile">
					<div class="tile-tittle">Lectores</div>
					<div class="tile-icon">
						<i class="fas fa-users fa-fw"></i>
						
					</div>
				</a>

				<a href="book-list.php" class="tile">
					<div class="tile-tittle">Libros</div>
					<div class="tile-icon">
						<i class="fas fa-book fa-fw"></i>
						
					</div>
				</a>

				<a href="reservation-list.php" class="tile">
					<div class="tile-tittle">Prestamos</div>
					<div class="tile-icon">
						<i class="fas fa-book-open fa-fw"></i>
						
					</div>
				</a>

				<a href="admin-list.php" class="tile">
					<div class="tile-tittle">Administradores</div>
					<div class="tile-icon">
						<i class="fas fa-user-secret fa-fw"></i>
						
					</div>
				</a>

				<a href="category-list.php" class="tile">
					<div class="tile-tittle">Categorias</div>
					<div class="tile-icon">
						<i class="fas fa-bookmark fa-fw"></i>
						
					</div>
				</a>

				<a href="publishing-house-list.php" class="tile">
					<div class="tile-tittle">Editoriales</div>
					<div class="tile-icon">
						<i class="fas fa-store-alt fa-fw"></i>
						
					</div>
				</a>
				
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