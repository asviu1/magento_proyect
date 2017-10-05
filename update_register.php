<?php
	if($_GET){

        include "conexion_bd.php";

		# Declaración de la variable que llega por get
		$cedula = $_GET['cedula'];

		#Consulta de datos...
		$consulta = mysqli_query($con, "SELECT * FROM clientes WHERE cedula = $cedula");

		#Declaración del arreglo que retorna la consulta de la BD con los registros
		$row = mysqli_fetch_array($consulta);

		if($row == ""){
			echo "<script>
					alert('Datos inexistentes');
					location.replace('index.php');
				  </script>";
		}

        session_start();

	} else {
        echo "<script>
                    alert('Error en la consulta');
                    location.replace('login.php');
                  </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Actualizar informacion</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/custom.css" rel="stylesheet">
</head>
<body>
	<div class="container">
      <header>
        <div class="col-md-6 col-md-offset-3">
           <div class="logo">
           <img class="img-responsive center-block" src="imgs/logo.png">
           </div>
        </div>
      </header>
   </div>
   <div class="container">
    	<div class="row">
            <?php

                # Validación de que tipo de usuario está actualizando, para que el botón volver regrese a donde en realidad debe de hacerlo
                if($_SESSION['document'] != "2121212"){
                    echo "<a href='dashboard.php' class='btn btn-success a-home'>
                            <i class='fa fa-arrow-left'></i>
                            Volver
                          </a>";
                } else {
                    echo "<a href='dashboard-admin.php' class='btn btn-success a-home'>
                            <i class='fa fa-arrow-left'></i>
                            Volver
                          </a>";
                }

            ?>
    		<section class="col-md-6 col-md-offset-3">
              <h2 class="green-text"><span><img src="imgs/edit.png"></span> Actualizacion datos</h2>
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Paso 1">
                                    <span class="round-tab">
                                        1
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Paso 2">
                                    <span class="round-tab">
                                        2
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Paso 3">
                                    <span class="round-tab">
                                        3
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Completado, enviar">
                                    <span class="round-tab">
                                        4
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form role="form" method="post">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                              <div class="form">
                                 <!-- Campo oculto que después se reemplaza -->
                                <input class="form-control" 
                                	   value="<?= $row['codigo']; ?>" 
                                	   name="codigo" 
                                	   type="hidden">
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control"
                                    	   value="<?= $row['nombre']; ?>" 
                                    	   placeholder="Nombre completo" 
                                    	   name="nombre"
                                    	   type="text">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control"
                                    	   value="<?= $row['cedula']; ?>" 
                                           placeholder="Cedula" 
                                           name="cedula" 
                                           type="number"
                                           readonly>
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control"
                                    	   value="<?= $row['contrasena']; ?>" 
                                    	   placeholder="Profesión" 
                                    	   name="contrasena" 
                                    	   type="text">
                                </div>
                                 <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control"
                                           value="<?= $row['profesion']; ?>" 
                                           placeholder="Profesión" 
                                           name="profesion" 
                                           type="text">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control"
                                    	   value="<?= $row['empresa']; ?>"
                                    	   placeholder="Empresa donde labora" 
                                    	   name="empresa" 
                                    	   type="text">
                                </div>
                              </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="button1 next-step">Siguiente</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <div class="form">
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                        <input class="form-control"
                                        	   value="<?= $row['direccion']; ?>"
                                        	   placeholder="Direccion" 
                                        	   name="direccion" 
                                        	   type="text">
                                    </div>
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                        <input class="form-control"
                                        	   value="<?= $row['barrio']; ?>"
                                        	   placeholder="Barrio" 
                                        	   name="barrio" 
                                        	   type="text">
                                    </div>
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                        <input class="form-control"
                                        	   value="<?= $row['email']; ?>"
                                        	   placeholder="E-mail" 
                                        	   name="email" 
                                        	   type="text">
                                    </div>
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                        <input class="form-control"
                                        	   value="<?= $row['telefono']; ?>"
                                        	   placeholder="Teléfono fijo" 
                                        	   name="telefono" 
                                        	   type="number">
                                    </div>
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="button1 prev-step">Anterior</button></li>
                                    <li><button type="button" class="button1 next-step">Siguiente</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <div class="form">
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                        <input class="form-control"
                                        	   value="<?= $row['celular']; ?>"
                                        	   placeholder="Numero de celular" 
                                        	   name="celular"
                                        	   type="number">
                                    </div>
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                        <input class="form-control"
                                        	   value="<?= $row['fechaNacimiento']; ?>" 
                                        	   name="fechaNacimiento" 
                                        	   type="text">
                                    </div>
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                        <input class="form-control"
                                        	   value="<?= $row['nohijos']; ?>"
                                        	   placeholder="Número de hijos" 
                                        	   name="nohijos" 
                                        	   type="number">
                                    </div>
                                    <!-- Campo oculto que después se reemplaza -->
                                    <input class="form-control" value="00" name="sucursal" type="hidden">
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                        <select name="sexo" class="form-control">
                                            <option value="default">Seleccione...</option>
                                            <option <?php if($row['sexo'] == "m"){ echo "selected"; } ?> value="m">Masculino</option>
                                            <option <?php if($row['sexo'] == "f"){ echo "selected"; } ?> value="f">Femenino</option>
                                            <option <?php if($row['sexo'] == "i"){ echo "selected"; } ?> value="i">Indefinido</option>
                                        </select>
                                    </div>
                                    <!-- Campo oculto que después se reemplaza -->
                                    <input class="form-control" value="00" name="puntos" type="hidden">
                                    <!-- Campo oculto que después se reemplaza -->
                                    <input class="form-control" value="00" name="habeasData" type="hidden">
                                    <!-- Campo oculto que después se reemplaza -->
                                    <input class="form-control" value="00" name="clubVino" type="hidden">
                                    <!-- Campo oculto que después se reemplaza -->
                                    <input class="form-control" value="00" name="avvillas" type="hidden">
                                </div>
                                <ul class="list-inline pull-right">
                                    <li><button type="button" class="button1 prev-step">Anterior</button></li>
                                    <li><button type="button" class="button1 next-step">Siguiente</button></li>
                                </ul>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <h3>Complete</h3>
                                <p>Haz completado todos los campos. ¿Deseas guardar los cambios?</p>
                                <ul class="list-inline pull-right">
                                    <li>
                                        <button class="button1 btn-info-full next-step" type="submit">
                                            <i class="fa fa-send"></i>
                                            &nbsp Enviar
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                    <!-- Script para la actualizacion de datos -->
                    <?php  

                        if($_POST){

                            include "conexion_bd.php";

                            # Recolección de datos. 
                            $codigo          = $_POST['codigo'];
                            $nombre          = $_POST['nombre'];
                            $cedula          = $_POST['cedula'];
                            $contrasena      = $_POST['contrasena'];
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
                            if($codigo != "" && $nombre != "" && $cedula != "" && $contrasena != "" && $profesion != "" &&  $empresa != "" &&  $direccion != "" &&  $barrio != "" &&  $email != "" &&  $telefono != "" &&  $celular != "" &&  $fechaNacimiento != "" &&  $nohijos != "" &&  $sucursal != "" &&  $sexo != "default" && $puntos != "" &&  $habeasData != "" &&  $clubVino != "" &&  $avvillas != ""){

                                # SQL de actualizar los datos.
                                $sql = "UPDATE clientes SET codigo = '$codigo', nombre = '$nombre', cedula = '$cedula', contrasena = '$contrasena', profesion = '$profesion', empresa = '$empresa', direccion = '$direccion', barrio = '$barrio', email = '$email', telefono = '$telefono', celular = '$celular', fechaNacimiento = '$fechaNacimiento', nohijos = '$nohijos', sucursal = '$sucursal', sexo = '$sexo', puntos = '$puntos', habeasData = '$habeasData', clubVino = '$clubVino', avvillas = '$avvillas' WHERE cedula = $cedula";

                                #Condicional si fué efectuoso el actualizar los datos
                                if(mysqli_query($con, $sql)){
                                    echo "<script>
                                            alert('Se modificó con éxito');
                                            location.replace('cerrar_session.php');
                                          </script>";
                                } else {
                                    echo "<script>
                                            alert('Ocurrió un error, por favor vuelve a intentarlo');
                                          </script>";
                                }

                            }
                        }

                    ?>
                </div>
            </section>
       </div>
    </div>
  </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/custom.js"></script>
</body>
</html>