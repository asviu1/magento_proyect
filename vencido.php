<?php  
	
	session_start();
	session_destroy();
	echo "<script>
			alert('Sesion vencida, Gracias por preferir nuestros servicios');
			window.location.replace('index.php');
		  </script>";
?>