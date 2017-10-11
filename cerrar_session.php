<?php
	session_destroy();
	echo "<script>
			alert('Ha finalizado la session, hasta pronto');
			location.replace('index.php');
		  </script>";
?>