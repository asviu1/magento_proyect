<?php
	include "seguridad.php";
	header('Content-type: text/html; charset=utf-8');

	if($_SESSION['document'] != "2121212"){
		echo "<script>
				alert('No tiene permisos suficientes para acceder');
				location.replace('dashboard.php');
		  	 </script>";
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Dashboard</title>
	<link rel="icon" href="imgs/favicon.png" type="img/png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/customCss.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 div-container border-black">
				<div class="col-lg-12 bg-img border-black"></div>
					<h3 class="main-title-user">Bienvenido: <?= $_SESSION['user']; ?></h3>
					<a href="cerrar_session.php" class="log-out">
						<i class="fa fa-sign-out"></i>
						Cerrar Session
					</a>
					<!-- Boton de apertura de los archivos-->
					<a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 first-button button" id="archivoOpen">
						<i class="fa fa-file-archive-o i-white left"></i>
						&nbsp Archivos Base
						<i class="fa fa-plus right i-white"></i>
					</a>
					<!-- Boton de cierre de los archivos-->
					<a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 first-button button" id="archivoClose">
						<i class="fa fa-file-archive-o i-white left"></i>
						&nbsp Archivos Base
						<i class="fa fa-minus right i-white"></i>
					</a>
					<!-- Contenido crono job -->
					<form action="export-archive.php" id="form-archivo" method="post">
						<div class="form-group">
							<p class="title-of-archive">¿Qué plantilla desea descargar?</p>
							<label><i class="fa fa-file-text-o"></i> &nbsp Archivo (.csv)</label>
							<select name="categoryToExport" class="form-control">
								<option value="default">Seleccione...</option>
								<option value="clientes">Clientes</option>
								<option value="productos">Productos</option>
								<option value="puntos">Puntos</option>
								<option value="ventas">Ventas</option>
							</select>
						</div>
						<button type="submit" class="btn btn-success-mercaldas col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-4 col-xs-4">
							<i class="fa fa-send"></i> Exportar
						</button>
					</form>
					<!-- Boton de apertura crono job-->
					<a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 first-button button" id="cronojobOpen">
						<i class="fa fa-clock-o i-white left"></i>
						&nbsp Cronojob
						<i class="fa fa-plus right i-white"></i>
					</a>
					<!-- Boton de cierre crono job -->
					<a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 first-button button" id="cronojobClose">
						<i class="fa fa-clock-o i-white left"></i>
						&nbsp Cronojob
						<i class="fa fa-minus right i-white"></i>
					</a>
					<!-- Contenido crono job -->
					<form action="config.php" method="post" enctype="multipart/form-data" id="form-crono">
						<div class="form-group">
							<label><i class="fa fa-file-text-o"></i> &nbspArchivo plano (.csv)</label>
							<input class="form-control" type="file" name="file" required>
						</div>
						<div class="form-group">
							<label><i class="fa fa-calendar"></i> &nbspFecha actual</label>
							<input class="form-control" type="date" name="date" required>
						</div>
						<div class="form-group">
							<label><i class="fa fa-cog"></i> &nbspCategoria a insertar</label>
							<select name="category" class="form-control" required>
								<option value="default">Seleccione...</option>
								<option value="clientes">Clientes</option>
								<option value="productos">Productos</option>
								<option value="puntos">Puntos</option>
								<option value="ventas">Ventas</option>
							</select>
						</div>
						<button type="submit" class="btn btn-success-mercaldas col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-4 col-xs-offset-1 col-xs-4">
							<i class="fa fa-send"></i> Enviar
						</button>
						<button type="reset" class="btn btn-danger-mercaldas col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-5 col-sm-offset-1 col-sm-4 col-xs-offset-1 col-xs-4">
							<i class="fa fa-trash"></i> Reset
						</button>
					</form>
					<!-- Boton de Exportar nuevos usuarios en EXCEL-->
					<a href="exportar_usuarios.php" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 first-button button">
						<i class="fa fa-users i-white left"></i>
						&nbsp Usuarios nuevos
						<i class="fa fa-plus right i-white"></i>
					</a>
					<!-- Boton de apertura segmentacion-->
					<a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 first-button button" id="segmOpen">
						<i class="fa fa-file-word-o i-white left"></i>
						&nbsp Reglamento
						<i class="fa fa-plus right i-white"></i>
					</a>
					<!-- Boton de cierre segmentacion -->
					<a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 first-button button" id="segmClose">
						<i class="fa fa-file-word-o i-white left"></i>
						&nbsp Reglamento
						<i class="fa fa-minus right i-white"></i>
					</a>
					<!-- Contenido segmentacion -->
					<form id="form-segmentacion" method="post">
						<textarea class="form-control" name="ganaMercaldas" placeholder="Aquí por favor coloque los términos y condiciones..."></textarea><br>
						<button type="submit" class="btn btn-success-mercaldas col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-4 col-sm-offset-1 col-sm-4 col-xs-offset-1 col-xs-4">
							<i class="fa fa-send"></i> Enviar
						</button>
						<button type="reset" class="btn btn-danger-mercaldas col-lg-offset-1 col-lg-4 col-md-offset-1 col-md-5 col-sm-offset-1 col-sm-4 col-xs-offset-1 col-xs-4">
							<i class="fa fa-trash"></i> Reset
						</button>
					</form>
					<?php 

						if($_POST){

							$id = 1;
							$ganaMercaldas = utf8_encode($_POST['ganaMercaldas']);

							// Validación server side para cuando los campos estén vacios
								if($ganaMercaldas != ""){

									// sql de inserción del campo
									$sql = "UPDATE reglamento SET ganaMercaldas = '$ganaMercaldas' WHERE id = '$id'";

									if(mysqli_query($con, $sql)){
										echo "<script>
												alert('Se insertó con éxito');
										  	  </script>";
									} else {
										echo "<script>
												alert('Ocurrió un problema, por favor intentelo de nuevo');
											  </script>";
									}
							// **********************************************************
							// Validación server side para cuando los campos estén vacios
							} else {
								echo "<script>
										alert('Por favor diligencie el campo de los terminos y condiciones');
									  </script>";
							}

						}
					?>
				</div>
			</div>
		</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/hidden_content.js"></script>
</body>
</html>