<?php
	include "seguridad.php";

	if($_SESSION['document'] == "2121212"){
		echo "<script>
				alert('No tiene permisos suficientes para acceder');
				location.replace('dashboard-admin.php');
		  	 </script>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/customCss.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-5 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 div-container border-black">
				<div class="col-lg-12 bg-img border-black"></div>
				<h3 class="main-title-user">Bienvenido <?= $_SESSION['user']; ?></h3>
				<a href="cerrar_session.php" class="log-out">
					<i class="fa fa-sign-out"></i>
					Cerrar Session
				</a>
				<!-- Botones de eventos -->
				<!-- Boton para actualizar la info-->
				<a href="update_register.php?cedula=<?= $_SESSION['document'];?>" class="col-lg-12 second-button button" type="button">
					<i class="fa fa-pencil i-white left"></i>
					&nbsp Actualizar informacion
					<i class="fa fa-plus right i-white right"></i>
				</a>
				<!-- Boton de apertura puntos-->
				<a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 second-button button" id="puntosOpen" type="button">
					<i class="fa fa-star i-white left"></i>
					&nbsp Mis puntos
					<i class="fa fa-plus right i-white"></i>
				</a>
				<!-- Boton de cierre puntos-->
				<a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 first-button button" id="puntosClose" type="button">
					<i class="fa fa-star i-white left"></i>
					&nbsp Mis puntos
					<i class="fa fa-minus right i-white"></i>
				</a>
				<!-- Contenido oculto puntos -->
				<div class="col-lg-12" id="form-search">
					<h1 class="numeric-result">
						<?php

							if($_SESSION['cantidad_puntos'] > 0){
								echo $_SESSION['cantidad_puntos'];
							} else {
								echo "0";
							}

						?>	
					</h1>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/hidden_content.js"></script>
</body>
</html>