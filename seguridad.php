<?php
	include "conexion_bd.php";
	session_start();

	if(!isset($_SESSION['user'])){
		echo "<script>
				alert('Acceso denegado, no posee los suficientes permisos');
				location.replace('index.php');
			  </script>";
	}
	
?>