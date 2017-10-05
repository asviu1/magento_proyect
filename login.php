<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Index</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/customCss.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Variable que abre la session y la conexion -->
	<?php
		include "conexion_bd.php";
	?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 div-container border-black">
				<div class="col-lg-12 bg-img border-black"></div>
				<h3 class="main-title">Ingrese a su cuenta mercaldas!</h3>
				<form id="login" method="post" autocomplete="off">
					<div class="form-group">
						<input class="form-control form-custom" placeholder="Ingrese su número de cédula" name="cedula" type="number">
					</div>
					<div class="form-group">
						<input class="form-control form-custom" placeholder="Ingrese su contraseña" name="contrasena" type="password">
					</div>
					<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-3 col-xs-6 border-black">
						<button class="first-button button" type="submit">Ingresar</button>
					</div>
				</form>
				<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
					<p class='information'>¿No sabes cual es tu contraseña? Sino la haz cambiado tu contraseña por defecto es: 000000</p>
				</div>
			</div>
		</div>
	</div>
	<?php

		if($_POST){

			$cedula     = mysqli_real_escape_string($con, $_POST['cedula']);
			$contrasena = mysqli_real_escape_string($con, $_POST['contrasena']);

			# Validacion de los campos vacios
			if($cedula != "" && $contrasena != ""){

				#Consulta SQL donde valida la cedula que se ingreso y la contraseña
				$sql = mysqli_query($con, "SELECT nombre, cedula FROM clientes WHERE cedula = '$cedula' AND contrasena = '$contrasena'");

				#Método para validar el retorno de las filas de la BD. Valida la existencia del cliente
				if(mysqli_num_rows($sql) > 0) {
					
					$row = mysqli_fetch_array($sql);
					# Iniciar la variable de session
					session_start();
					$_SESSION['user']            = $row['nombre'];
					$_SESSION['document']        = $row['cedula'];
					$_SESSION['cantidad_puntos'] = $row['puntos'];

					if($cedula == "2121212"){
						echo "<script>
								location.replace('dashboard-admin.php');
							 </script>";
					} else {
						echo "<script>
								location.replace('dashboard.php');
							 </script>";
					}


				} else {
					echo "<script>
							alert('Datos erroneos. Por favor intentelo de nuevo');
					  	 </script>";
				}

			} else {
				echo "<script>
						alert('Campos vacios. Por favor diligencielos');
					  </script>";
			}
		}
	?>
</body>
</html>