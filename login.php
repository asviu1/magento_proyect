<?php 
	header('Content-type: text/html; charset=utf-8');
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Index</title>
	<!-- Recuersos ajenos -->
	<link rel="icon" href="imgs/favicon.png" type="img/png">
	<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="contrib/hammerjs/hammer.min.js"></script>
	<script src="contrib/hammerjs/hammer.fakemultitouch.js"></script>
	<link rel="stylesheet" href="lib/drum.css">
	<script src="lib/drum.js"></script>
	<link rel="stylesheet" href="lib/custom.css">
	<script src="lib/custom.js"></script>
	<!-- Mis recursos maindeveloper -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/customCss.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Variable que abre la session y la conexion -->
	<?php
		include "conexion_bd.php";
	?>
</head>
<body>
	<div class="container-fluid div-center">
		<div class="row">
			<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 div-container border-black">
			<form method="post" id="login" autocomplete="off">
				<div class="col-lg-12 bg-img border-black"></div>
				<h3 class="main-title">Ingrese a su cuenta mercaldas!</h3>
				<input class="form-control form-custom" 
							   placeholder="Ingrese su número de cédula" 
							   name="cedula"
							   type="number"
							   id="field-cedula"
							   value="<?= $_SESSION['cedula'] ?>">
				<!-- Formulario de datapicker -->
				<div class="col-lg-12"></div>
				<h4 class="text-center faker-place">Seleccione día y mes de nacimiento</h4>
				<div class="date_wrapper outside">
					<article>
						<div class="lines"></div>
						<select class="date" id="month" name="month">
							<option value="1">Ene</option>
							<option value="2">Feb</option>
							<option value="3">Mar</option>
							<option value="4">Abr</option>
							<option value="5">Mayo</option>
							<option value="6">Jun</option>
							<option value="7">Jul</option>
							<option value="8">Ago</option>
							<option value="9">Sept</option>
							<option value="10">Oct</option>
							<option value="11">Nov</option>
							<option value="12">Dic</option>
						</select>
						<select class="date" id="date" name="day">
							<option value="01">1</option>
							<option value="02">2</option>
							<option value="03">3</option>
							<option value="04">4</option>
							<option value="05">5</option>
							<option value="06">6</option>
							<option value="07">7</option>
							<option value="08">8</option>
							<option value="09">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>
					</article>
				</div>
				<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-3 col-xs-6 border-black">
					<button class="first-button button" type="submit">Ingresar</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<?php

		if($_POST){

			#Acá se destroye la variable de session $_SESSION['cedula'] que se imprime en el placeholder
			session_destroy();

			$cedula     = mysqli_real_escape_string($con, $_POST['cedula']);
			$month      = $_POST['month'];
			$day        = $_POST['day'];

			#Variable de la fecha junta. 

			$fechaNacimiento = $month.$day;

			# Validacion de los campos vacios
			if($cedula != ""){

				#Consulta SQL donde valida la cedula que se ingreso y la contraseña del user
				$sql = mysqli_query($con, "SELECT nombre, cedula FROM clientes WHERE cedula = '$cedula' AND fechaNacimiento = '$fechaNacimiento'");

				#Consulta SQL donde valida la cantidad de puntos
				$sql2 = mysqli_query($con, "SELECT puntos FROM puntos WHERE cedula = '$cedula' ORDER BY id desc");

				#Método para validar el retorno de las filas de la BD. Valida la existencia del cliente
				if(mysqli_num_rows($sql) > 0) {
					
					#Declaracion del arreglo que retorna los datos del cliente de la tabla clientes. 
					$row = mysqli_fetch_array($sql);

					#Declaracion de la varible que retorna los puntos del cliente de la tabla puntos.
					$row2 = mysqli_fetch_array($sql2);

					# Iniciar la variable de session
					session_start();
					$_SESSION['user']            = $row['nombre'];
					$_SESSION['document']        = $row['cedula'];
					$_SESSION['cantidad_puntos'] = $row2['puntos'];

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
							alert('Datos erróneos. Por favor intentelo de nuevo');
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