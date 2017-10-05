<?php
	if($_POST){

		include "conexion_bd.php";

		# Recolección de datos.
		$codigo          = $_POST['codigo'];
		$nombre          = $_POST['nombre'];
		$cedula          = $_POST['cedula'];
		$contrasena      = "000000";
		$profesion       = $_POST['profesion'];
		$empresa         = $_POST['empresa'];
		$direccion       = $_POST['direccion'];
		$barrio          = $_POST['barrio'];
		$email           = $_POST['email'];
		$telefono        = $_POST['telefono'];
		$celular         = $_POST['celular'];
		$fechaNacimiento = $_POST['fechaNacimiento'];
		$nohijos         = $_POST['nohijos'];
		$sucursal        = $_POST['sucursal'];
		$sexo            = $_POST['sexo'];
		$puntos          = $_POST['puntos'];
		$habeasData      = $_POST['habeasData'];
		$clubVino        = $_POST['clubVino'];
		$avvillas        = $_POST['avvillas'];

		# Condicional que los datos no vengan vacios. 
		if($codigo != "" && $nombre != "" && $cedula != "" && $profesion != "" &&  $empresa != "" &&  $direccion != "" &&  $barrio != "" &&  $email != "" &&  $telefono != "" &&  $celular != "" &&  $fechaNacimiento != "" &&  $nohijos != "" &&  $sucursal != "" &&  $sexo != "default" && $puntos != "" &&  $habeasData != "" &&  $clubVino != "" &&  $avvillas != ""){

			$sql = "INSERT INTO clientes VALUES('$codigo', '$nombre', '$cedula', '$contrasena', '$profesion', '$empresa', '$direccion', '$barrio', '$email', '$telefono', '$celular', '$fechaNacimiento', '$nohijos', '$sucursal', '$sexo', '$puntos', '$habeasData', '$clubVino', '$avvillas')";

			if(mysqli_query($con, $sql)){
				echo "<script>
						alert('Se insertó con éxito');
						location.replace('index.php');
					  </script>";
			} else {
				echo "<script>
						alert('Ocurrió un error al insertar. Por favor vuelva a intentarlo');
						location.replace('registro.html');
					  </script>";
			}

		} else{
			echo "<script>
				alert('Campos vacíos o nulos, por favor completarlos');
				location.replace('index.php');
				</script>";
		}
	} else {
		echo "<script>
				alert('Accion denegada, vuelva a intentarlo.');
				location.replace('index.php');
			  </script>";
	}

?>