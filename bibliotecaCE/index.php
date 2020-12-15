<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Login</title>

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

	<!-- Sweet Alert V8.13.0 JS file -->
	<script src="./js/sweetalert2.min.js" ></script>

	<!-- jQuery Custom Content Scroller V3.1.5 -->
	<link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">
	
	<!-- General Styles -->
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<div class="login-container">
		<img src="./assets/img/biblioteca-font.jpg" id="fondoimg">
		<div class="login-content">
			<h2 class="text-center"><b>BIBLIOTECA ESCOLAR</b></h2>
			<p class="text-center">
				<img src="./assets/img/logo_ce.jpg">
			</p>
			<p>
				<h1 class="text-center">Inicia sesión con tu cuenta</h1>
			</p>
			<form action="index.php" method="POST" onsubmit="return validar();">
				<div class="form-group">
					<label for="usuario" class="bmd-label-floating"><i class="fas fa-user-secret"></i> &nbsp; <b>Administrador</b></label>
					<input type="text" class="form-control" id="usuario" name="usuario" pattern="[a-zA-Z0-9]{1,35}" maxlength="35">
				</div>
				<div class="form-group">
					<label for="contraseña" class="bmd-label-floating"><i class="fas fa-key"></i> &nbsp; <b>Contraseña</b></label>
					<input type="password" class="form-control" id="contraseña" name="contraseña" maxlength="200">
				</div>
				<button type="submit" class="btn-login text-center"><a>ENTRAR</a></button>
			</form>
		</div>
            <?php
          if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
              require_once "BD/conexionBD.php";
              require_once "login.php";
          }
          
           ?>
    
	</div>

	
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