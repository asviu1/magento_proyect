<?php
	# Validación si llegó algo por post
	if($_POST){

		include "conexion_bd.php";
		
		#Declaración de la variable que filtra porque categoria viene
		$categoryToExport = $_POST['categoryToExport'];

		#Condicional que no permite la descarga sino se selecciona categoria
		if($categoryToExport != "default"){

			# Filtro de categoria clientes para exportar ese .CSV
			if($categoryToExport == "clientes"){
				header("Content-disposition: attachment; filename=clientes_plantilla.csv");
				header("Content-type: archivos_base/");
				readfile("archivos_base/clientes_plantilla.csv");
			}

			# Filtro de categoria productos para exportar ese .CSV
			if($categoryToExport == "productos"){
				header("Content-disposition: attachment; filename=productos_plantilla.csv");
				header("Content-type: archivos_base/");
				readfile("archivos_base/productos_plantilla.csv");
			}

			# Filtro de categoria puntos para exportar ese .CSV
			if($categoryToExport == "puntos"){
				header("Content-disposition: attachment; filename=puntos_plantilla.csv");
				header("Content-type: archivos_base/");
				readfile("archivos_base/puntos_plantilla.csv");
			}

			# Filtro de categoria ventas para exportar ese .CSV
			if($categoryToExport == "ventas"){
				header("Content-disposition: attachment; filename=ventas_plantilla.csv");
				header("Content-type: archivos_base/");
				readfile("archivos_base/ventas_plantilla.csv");
			}

		# Validacion server side cuando no seleccione ninguna categoria 
		} else {
			echo "<script>
				alert('Por favor seleccione una categoria');
				location.replace('dashboard.php');
				</script>";
		}
	} else {
		echo "<script>
				alert('Accion denegada, vuelva a intentarlo.');
				location.replace('dashboard.php');
			  </script>";
	}

?>