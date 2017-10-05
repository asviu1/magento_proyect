<?php
	if($_POST) {
		
		include "conexion_bd.php";
		
		# Recolección de datos
		$cedula = $_POST['cedula'];

		# Consultar SQL con la conexion para el método mysqli_query
		$consulta = mysqli_query($con, "SELECT * FROM clientes WHERE cedula = $cedula");

		$row = mysqli_fetch_array($consulta);

		if($row == ""){
			echo "<script>
					alert('El documento ingresado no existe en el sistema');
					location.replace('dashboard.php');
				 </script>";
		}
	} else {
		echo "<script>
				alert('No hay datos para la consulta');
				location.replace('dashboard.php');
			  </script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Mis puntos!</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/customCss.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<a href="dashboard.php" class="btn btn-success a-home">
				<i class="fa fa-arrow-left"></i>
				Volver
			</a>
			<div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 div-container border-black">
				<a href="index.php">
					<div class="col-lg-12 bg-img border-black"></div>
				</a>
				<h1 class="text-center">Tus puntos...</h1>
			</div>
			<div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-3 col-sm-6">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Codigo</th>
							<th>Numero de cedula</th>
							<th>Cantidad de puntos</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?= $row['codigo'] ?></td>
							<td><?= $row['cedula'] ?></td>
							<td><?= $row['puntos'] ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>