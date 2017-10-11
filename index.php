<?php 
	#Acá se destroye la variable de session $_SESSION['cedula'] por si le da click a volver
	session_start();
	session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Mercaldas | Bienvenido</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/customCss.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8 div-container border-black">
				<div class="col-lg-12 bg-img border-black"></div>
				<h3 class="personal-document">Por favor digíte su cédula</h3>
				<form autocomplete="off" method="post">
					<div class="form-group">
						<input class="form-control-custom edit-icon" placeholder="Ejemplo: 1053XXXXXX" name="cedula" type="text">
					</div>
					<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10 border-black">
						<button type="submit" class="first-button button">Consultar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php

		if($_POST){
			
			#conexión a la BD
			include "conexion_bd.php";

			#declaracion de las variables
			$cedula = $_POST['cedula'];

			$sql = mysqli_query($con, "SELECT * FROM clientes WHERE cedula = '$cedula'");

			#Validacion si el resultado de la BD existe o no, por lo tanto redirecciona
			if(mysqli_num_rows($sql) > 0){

				#En la variable $row se almacena como un arreglo todo lo que se retorno de la BD
				$row = mysqli_fetch_array($sql);

				session_start();
				#Declaracion de la variable que envia la cédula. 
				$_SESSION['cedula'] = $row['cedula'];

				echo "<script>
						alert('Su documento está en la Base de Datos, por favor ingrese');
						location.replace('login.php');
					 </script>";
			} else {

				session_start();
				$_SESSION['cedula'] = $_POST['cedula'];
				
				echo "<script>
						alert('Su documento no existe en la Base de Datos, por favor regístrese');
						location.replace('registro.php');
					 </script>";
			}
		}

	?>
</body>
</html>