<?php
	include "seguridad.php";
	header('Content-type: text/html; charset=utf-8');
	
	$actualTime = idate('d').'/'.idate('m').'/'.idate('Y');

	if($_SESSION['document'] == "2121212"){
		echo "<script>
				alert('No tiene permisos suficientes para acceder');
				location.replace('dashboard-admin.php');
		  	 </script>";
	}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Dashboard</title>
	<link rel="icon" href="imgs/favicon.png" type="img/png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/customCss.css">
</head>
<body onload="iniciar()" onkeypress="detener()" onclick="detener()" onmousemove="detener()">
	<div class="container-fluid div-center">
		<div class="row">
			<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 div-container border-black">
				<div class="col-lg-12 bg-img border-black"></div>
				<h3 class="main-title-user">Bienvenido <?= $_SESSION['user']; ?></h3>
				<a href="cerrar_session.php" class="log-out" id="cerrar_session">
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
					<p class="points-update">Última actualización de sus puntos <?= $actualTime ?></p>
				</div>
			</div>
		</div>
	</div>
	<!-- ************************************ -->
	<!-- Ventana modal para el tiempo vencido -->
	<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="onload">
	    <div class="modal-dialog">
	      <div class="modal-content">

	        <div class="modal-body text-center">
	        <button class="btn btn-danger-custom" id="closeModal">
	        	<i class="fa fa-times"></i>
	        </button>
	         <p>Sesion cerrada por inactividad</p>
	         <p>¡Gracias por visitarnos te esperamos pronto!</p>
	         <img class="img-responsive center-block" src="imgs/logo.png">
	        </div>
	       
	      </div>
	    </div>
	</div>
	<!-- ************************************ -->
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/hidden_content.js"></script>
	<script src="js/all.js"></script>
	<script>
        alertify.theme("bootstrap");
    </script>
</body>
</html>