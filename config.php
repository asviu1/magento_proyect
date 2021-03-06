<?php
	if($_FILES){

		include "conexion_bd.php";
		# Recolección de datos
		$nfile     = $_POST['date'];
		$path      = $_FILES['file']['name'];
		$category  = $_POST['category'];
		$extension = pathinfo($path, PATHINFO_EXTENSION);
		$saveFile  = 'files/'.$nfile.'-'.$category.'.'.$extension;

		# Validación que el campo Categoria no venga vacio, o traiga el valor por defecto
		if($category != "default"){

		 	move_uploaded_file($_FILES['file']['tmp_name'], $saveFile);

			$lineas = file('files/'.$nfile.'-'.$category.'.csv');

		 	# Validación si la categoria es Clientes...
		 	if($category == "clientes"){

				foreach ($lineas as $value) {
					
					# Esta parte delimita por ; cada variable a insertar
					$datos = explode(";", $value);

					# Declaracion de las variables, por ; toma la posicion como arreglo

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
					$fechaCumple      = trim($datos[11]);
					$nohijos          = trim($datos[12]);
					$sucursal         = trim($datos[13]);
					$sexo             = trim($datos[14]);
					$habeasData       = trim($datos[15]);
					$clubVino         = trim($datos[16]);
					$avvillas         = trim($datos[17]);

					# Prueba para ver si está tomando los datos del archivo plano.

					$sql = "INSERT INTO backClientes VALUES('$codigo', '$nombre', '$cedula', '$profesion', '$empresa', '$direccion', '$barrio', '$email', '$telefono', '$celular', '$fechaNacimiento', '$fechaCumple', '$nohijos', '$sucursal', '$sexo', '$habeasData', '$clubVino', '$avvillas')";

					if(mysqli_query($con, $sql)){
						echo "<script>
        						alert('Se insertó con éxito');
        						location.replace('dashboard-admin.php');
    						  </script>";
					} else {
						echo "<script>
						alert('Ocurrió un error al insertar');
						</script>";
					}
				}
			}

		 	# Validación si la categoria es Productos...
			if($category == "productos"){
			
				foreach ($lineas as $value) {
					
					# Esta parte delimita por ; cada variable a insertar
					$datos = explode(";", $value);

					# Declaracion de las variables, por ; toma la posicion como arreglo

					$codArticulo             = trim(utf8_encode($datos[0]));
					$nombreArticulo          = trim(utf8_encode($datos[1]));
					$proveedor               = trim(utf8_encode($datos[2]));
					$vlrNeto                 = trim(utf8_encode($datos[3]));
					$nombreSeccionCategoria  = trim(utf8_encode($datos[4]));
					$nombreTipoSubcategoria  = trim(utf8_encode($datos[5]));

					# Prueba para ver si está tomando los datos del archivo plano.

					$sql = "INSERT INTO productos VALUES ('$codArticulo','$nombreArticulo','$proveedor','$vlrNeto','$nombreSeccionCategoria','$nombreTipoSubcategoria')";

					if(mysqli_query($con, $sql)){
						echo "<script>
						alert('Se insertó con éxito');
						location.replace('dashboard-admin.php');
						</script>";
					} else {
						echo "<script>
						alert('Ocurrió un error al insertar');
						</script>";
					}
				}

			}
			if($category == "puntos"){

				foreach ($lineas as $value) {
					
					# Esta parte delimita por ; cada variable a insertar
					$datos = explode(";", $value);

					# Declaracion de las variables, por ; toma la posicion como arreglo

					$codigo           = trim($datos[0]);
					$cedula           = trim($datos[1]);
					$puntos           = trim($datos[2]);
					$fecha            = trim($datos[3]);

					# Prueba para ver si está tomando los datos del archivo plano.

					$sql = "INSERT INTO puntos VALUES (default, '$codigo','$cedula','$puntos','$fecha')";

					if(mysqli_query($con, $sql)){
						echo "<script>
						alert('Se insertó con éxito');
						location.replace('dashboard-admin.php');
						</script>";
					} else {
						echo "<script>
						alert('Ocurrió un error al insertar');
						</script>";
					}
				}
			}
			if($category == "ventas"){
				
				foreach ($lineas as $value) {
					
					# Esta parte delimita por ; cada variable a insertar
					$datos = explode(";", $value);

					# Declaracion de las variables, por ; toma la posicion como arreglo

					$cliente           = trim(utf8_encode($datos[0]));
					$factura           = trim(utf8_encode($datos[1]));
					$codArticulo       = trim(utf8_encode($datos[2]));
					$nombreArticulo    = trim(utf8_encode($datos[3]));
					$proveedor         = trim(utf8_encode($datos[4]));
					$cantidad          = trim(utf8_encode($datos[5]));
					$vlrBruto          = trim(utf8_encode($datos[6]));
					$porcentajeDcto    = trim(utf8_encode($datos[7]));
					$valorDcto         = trim(utf8_encode($datos[8]));
					$porcentajeIva     = trim(utf8_encode($datos[9]));
					$vlrIva            = trim(utf8_encode($datos[10]));
					$vlrNeto           = trim(utf8_encode($datos[11]));
					$fecha             = trim(utf8_encode($datos[12]));
					$hora              = trim(utf8_encode($datos[13]));
					$caja              = trim(utf8_encode($datos[14]));
					$sucursal          = trim(utf8_encode($datos[15]));
					$nombreSucursal    = trim(utf8_encode($datos[16]));
					$seccion           = trim(utf8_encode($datos[17]));
					$nombreSeccion     = trim(utf8_encode($datos[18]));
					$tipoProducto      = trim(utf8_encode($datos[19]));
					$nombreTipo        = trim(utf8_encode($datos[20]));

					# Prueba para ver si está tomando los datos del archivo plano.

					$sql = "INSERT INTO ventas VALUES (default, '$cliente','$factura','$codArticulo','$nombreArticulo','$proveedor','$cantidad','$vlrBruto','$porcentajeDcto','$valorDcto','$porcentajeIva','$vlrIva','$vlrNeto','$fecha','$hora','$caja','$sucursal','$nombreSucursal','$seccion','$nombreSeccion','$tipoProducto','$nombreTipo')";

					if(mysqli_query($con, $sql)){
						echo "<script>
						alert('Se insertó con éxito');
						location.replace('dashboard-admin.php');
						</script>";
					} else {
						echo "<script>
						alert('Ocurrió un error al insertar');
						</script>";
					}
				}

			}

		}

		# Aquí valida del lado del servidor que no ha seleccionado ninguna categoria
		else {
			echo "<script>
				alert('No se puede insertar datos si no se selecciona una categoria');
				location.replace('dashboard-admin.php');
				</script>";
		}
	} else {
		echo "<script>
				alert('Accion denegada, vuelva a intentarlo.');
				location.replace('dashboard-admin.php');
			  </script>";

	}
?>