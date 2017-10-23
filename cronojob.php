<?php  
	
	#Incluye conexión a la Base de Datos.
	include "conexion_bd.php";
	
	#Primer proceso, inserción de clientes
	// *************************************

	# Recolección de datos en un arreglo
	$lineas = file('mercaldas/POSCLI.TXT');

	foreach ($lineas as $value){

		# Esta parte delimita por | cada variable a insertar
		$datos = explode("|", $value);

		# Declaracion de las variables, por | toma la posicion como arreglo

		$codigo           = trim($datos[0]);
		$nombre           = trim($datos[1]);
		$cedula           = trim($datos[2]);
		$profesion        = trim($datos[3]);
		$empresa          = trim($datos[4]);
		$direccion        = trim($datos[5]);
		$barrio           = trim($datos[6]);
		$email            = trim($datos[7]);
		$telefono         = trim($datos[8]);
		$celular          = trim($datos[9]);
		$fechaNacimiento  = trim($datos[10]);
		$fechaCumple      = '0000/00/00';
		$nohijos          = trim($datos[11]);
		$sucursal         = trim($datos[12]);
		$sexo             = trim($datos[13]);
		$habeasData       = '0';
		$clubVino         = '0';
		$avvillas         = '0';

		$sql = "INSERT INTO clientes VALUES('$codigo', '$nombre', '$cedula', '$profesion', '$empresa', '$direccion', '$barrio', '$email', '$telefono', '$celular', '$fechaNacimiento', '$fechaCumple', '$nohijos', '$sucursal', '$sexo', '$habeasData', '$clubVino', '$avvillas')";

		if(mysqli_query($con, $sql)){


			# SQL para insertar en la tabla de clientes nuevos.
			$sql2 = "INSERT INTO clientesnuevos VALUES('$codigo', '$nombre', '$cedula', '$profesion', '$empresa', '$direccion', '$barrio', '$email', '$telefono', '$celular', '$fechaNacimiento', '$fechaCumple', '$nohijos', '$sucursal', '$sexo', '$habeasData', '$clubVino', '$avvillas')";

			# Variable que alberga la inserción de datos en la tabla de clientes nuevos
			$query = mysqli_query($con, $sql2);

			// Validacion de inserción en la taba clientes. 
			echo "Cada registro de clientes se insertó con éxito. <br>";


		} else {
			echo "Ocurrió un error al insertar.";
		}
	}

	echo "<hr>";

	#Segundo proceso, inserción de puntos
	// *************************************

	# Recolección de datos en un arreglo
	$lineas = file('mercaldas/PUNTOS.TXT');

	foreach ($lineas as $value){

		# Esta parte delimita por | cada variable a insertar
		$datos = explode("|", $value);

		# Declaracion de las variables, por | toma la posicion como arreglo

		$codigo           = trim($datos[0]);
		$cedula           = trim($datos[1]);
		$puntos           = trim($datos[2]);
		$time             = date("Y-m-d");

		$sql = "INSERT INTO puntos VALUES (default, '$codigo','$cedula','$puntos','$time')";

		if(mysqli_query($con, $sql)){
			echo "Cada registro de puntos se insertó con éxito. <br>";
		} else {
			echo "Ocurrió un error al insertar.";
		}
	}

	echo "<hr>";

	#Tercer proceso, inserción de Ventas
	// *********************************

	# Recolección de datos en un arreglo
	$lineas = file('mercaldas/VENTAS.TXT');

	foreach ($lineas as $value) {
					
		# Esta parte delimita por | cada variable a insertar
		$datos = explode("|", $value);

		# Declaracion de las variables, por | toma la posicion como arreglo

		$cliente           = trim($datos[0]);
		$factura           = trim($datos[1]);
		$codArticulo       = trim($datos[2]);
		$nombreArticulo    = trim($datos[3]);
		$proveedor         = trim($datos[4]);
		$cantidad          = trim($datos[5]);
		$vlrBruto          = trim($datos[6]);
		$porcentajeDcto    = trim($datos[7]);
		$valorDcto         = trim($datos[8]);
		$porcentajeIva     = trim($datos[9]);
		$vlrIva            = trim($datos[10]);
		$vlrNeto           = trim($datos[11]);
		$fecha             = trim($datos[12]);
		$hora              = trim($datos[13]);
		$caja              = trim($datos[14]);
		$sucursal          = trim($datos[15]);
		$nombreSucursal    = trim($datos[16]);
		$seccion           = trim($datos[17]);
		$nombreSeccion     = trim($datos[18]);
		$tipoProducto      = trim($datos[19]);
		$nombreTipo        = trim($datos[20]);

		# Prueba para ver si está tomando los datos del archivo plano.

		$sql = "INSERT INTO ventas VALUES (default, '$cliente','$factura','$codArticulo','$nombreArticulo','$proveedor','$cantidad','$vlrBruto','$porcentajeDcto','$valorDcto','$porcentajeIva','$vlrIva','$vlrNeto','$fecha','$hora','$caja','$sucursal','$nombreSucursal','$seccion','$nombreSeccion','$tipoProducto','$nombreTipo')";

		if(mysqli_query($con, $sql)){
			echo "Cada registro de ventas se insertó con éxito. <br>";
		} else {
			echo "Ocurrió un error al insertar.";
		}
	}

	# Exportar los clientes nuevos cada cronojob que se ejecute
	// ********************************************************
	$sql = "SELECT * FROM clientesnuevos";

	$rs = mysqli_query($con, $sql);

	// Abrir el archivo y predisponerlo a que será escrito
	$file = fopen("mercaldas/EXPOSCLI.TXT", "w");

	// Ciclo que recorre cada registro
	while($row = mysqli_fetch_array($rs)){

		// Arreglo que trae cada registro de la BD
		$arreglo = $row['codigo'].'|'.$row['nombre'].'|'.$row['cedula'].'|'.$row['profesion'].'|'.$row['empresa'].'|'.$row['direccion'].'|'.$row['barrio'].'|'.$row['email'].'|'.$row['telefono'].'|'.$row['celular'].'|'.$row['fechaNacimiento'].'|'.$row['fechaCumple'].'|'.$row['nohijos'].'|'.$row['sucursal'].'|'.$row['sexo'].'|'.$row['habeasData'].'|'.$row['clubVino'].'|'.$row['avvillas'];

		// Almacena en el .TXT cada línea del ciclo que se trae de la tabla de la BD
		fwrite($file, $arreglo);
	};
		fclose($file);
?>