<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Admin View</title>
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<!-- Mis recursos maindeveloper -->
	<link rel="icon" href="imgs/favicon.png" type="img/png">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/customCss.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 div-container border-black">
			<form method="post" id="login" autocomplete="off">
				<div class="col-lg-12 bg-img border-black"></div>
				<h3 class="main-title title-adm">Ingrese a su cuenta mercaldas!</h3>
				<input class="form-control form-custom adm" 
							   placeholder="Ingrese su número de cédula" 
							   name="cedula"
							   type="number">
				<input class="form-control form-custom adm" 
							   placeholder="Fecha de nacimiento, mes/dia" 
							   name="fechaNacimiento"
							   type="password">
				<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-3 col-xs-6 border-black">
					<button class="first-button button" type="submit">Ingresar</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<?php

		if($_POST){

			include 'conexion_bd.php';

			$cedula               = mysqli_real_escape_string($con, $_POST['cedula']);
			$fechaNacimiento      = $_POST['fechaNacimiento'];

			# Validacion de los campos vacios
			if($cedula != "" && $fechaNacimiento != ""){

				#Consulta SQL donde valida la cedula que se ingreso y la contraseña del user
				$sql = mysqli_query($con, "SELECT nombre, cedula FROM clientes WHERE cedula = '$cedula' AND fechaNacimiento = '$fechaNacimiento'");

				if(mysqli_num_rows($sql) > 0) {

					#Declaracion del arreglo que retorna los datos del cliente de la tabla clientes. 
					$row = mysqli_fetch_array($sql);

					# Iniciar la variable de session
					session_start();
					$_SESSION['user']            = $row['nombre'];
					$_SESSION['document']        = $row['cedula'];

					if($cedula != "2121212"){
						echo "<script>
								alert('No tiene permisos para acceder a este sitio');
								location.replace('login.php');
							 </script>";
					} else {
						echo "<script>
								location.replace('dashboard-admin.php');
							 </script>";
					}
				}
			}

		}
	?>
</body>
</html>