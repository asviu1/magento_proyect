<?php
	if($_GET){

        header('Content-type: text/html; charset=utf-8');
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
<html lang="es">
<head>
	<title>Actualizar informacion</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <link rel="icon" href="imgs/favicon.png" type="img/png">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/custom.css" rel="stylesheet">
  <script type="text/javascript">
      function cambiaValor(valor){
          if(valor.checked){
              document.updateForm.habeasData.value=1;
          }
      }
  </script>
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
              <h2 class="green-text text-center"><span><img src="imgs/edit.png"></span> Actualizacion datos</h2>
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
                    <form role="form" method="post" name="updateForm" id="updateForm">
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
                                    	   type="text"
                                         data-validation="required">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control"
                                    	   value="<?= $row['cedula']; ?>" 
                                           placeholder="Cedula" 
                                           name="cedula" 
                                           type="number"
                                           readonly
                                           data-validation="required">
                                </div>
                                 <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control"
                                           value="<?= $row['profesion']; ?>" 
                                           placeholder="Profesión" 
                                           name="profesion" 
                                           type="text"
                                           data-validation="required">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control"
                                    	   value="<?= $row['empresa']; ?>"
                                    	   placeholder="Empresa donde labora" 
                                    	   name="empresa" 
                                    	   type="text"
                                         data-validation="required">
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
                                        	   type="text"
                                             data-validation="required">
                                    </div>
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                        <input class="form-control"
                                        	   value="<?= $row['barrio']; ?>"
                                        	   placeholder="Barrio" 
                                        	   name="barrio" 
                                        	   type="text"
                                             data-validation="required">
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
                                        	   type="number"
                                             data-validation="required">
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
                                        	   type="number"
                                             data-validation="required">
                                    </div>
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                        <input class="form-control"
                                          	   value="<?= $row['fechaCumple']; ?>" 
                                          	   name="fechaCumple" 
                                          	   type="date"
                                               data-validation="required">
                                    </div>
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                        <input class="form-control"
                                               value="<?= $row['nohijos']; ?>"
                                               placeholder="Número de hijos" 
                                               name="nohijos" 
                                               type="number"
                                               data-validation="required">
                                    </div>
                                    <!-- Cada campo -->
                                    <div class="form-group">
                                      <select name="sucursal" id="sucursal" class="form-control">
                                          <option value="default">Mercaldas donde realice sus compras...</option>
                                          <option <?php if($row['sucursal'] == "0"){ echo "selected"; } ?> value="0">Electrodomésticos</option>
                                          <option <?php if($row['sucursal'] == "1"){ echo "selected"; } ?> value="1">Centro</option>
                                          <option <?php if($row['sucursal'] == "2"){ echo "selected"; } ?> value="2">Sultana</option>
                                          <option <?php if($row['sucursal'] == "3"){ echo "selected"; } ?> value="3">La fuente</option>
                                          <option <?php if($row['sucursal'] == "5"){ echo "selected"; } ?> value="5">Palmas</option>
                                          <option <?php if($row['sucursal'] == "6"){ echo "selected"; } ?> value="6">Medicamentos</option>
                                          <option <?php if($row['sucursal'] == "8"){ echo "selected"; } ?> value="8">Av. Kevin Angel</option>
                                          <option <?php if($row['sucursal'] == "11"){ echo "selected"; } ?> value="11">Palermo</option>
                                          <option <?php if($row['sucursal'] == "12"){ echo "selected"; } ?> value="12">San José</option>
                                          <option <?php if($row['sucursal'] == "14"){ echo "selected"; } ?> value="14">Calleja</option>
                                          <option <?php if($row['sucursal'] == "15"){ echo "selected"; } ?> value="15">Enea</option>
                                          <option <?php if($row['sucursal'] == "16"){ echo "selected"; } ?> value="16">Villamaria</option>
                                          <option <?php if($row['sucursal'] == "33"){ echo "selected"; } ?> value="33">Neira</option>
                                          <option <?php if($row['sucursal'] == "43"){ echo "selected"; } ?> value="43">Central de Carnes</option>
                                          <option <?php if($row['sucursal'] == "50"){ echo "selected"; } ?> value="50">Versalles</option>
                                          <option <?php if($row['sucursal'] == "51"){ echo "selected"; } ?> value="51">Central de Abarrotes</option>
                                          <option <?php if($row['sucursal'] == "52"){ echo "selected"; } ?> value="52">San Marcel</option>
                                          <option <?php if($row['sucursal'] == "53"){ echo "selected"; } ?> value="53">Cent. Proc. Carnicos</option>
                                          <option <?php if($row['sucursal'] == "54"){ echo "selected"; } ?> value="54">Central Fruver</option>
                                          <option <?php if($row['sucursal'] == "55"){ echo "selected"; } ?> value="55">Suministros</option>
                                          <option <?php if($row['sucursal'] == "58"){ echo "selected"; } ?> value="58">Central de Panaderia</option>
                                          <option <?php if($row['sucursal'] == "68"){ echo "selected"; } ?> value="68">Central Panaderia Versalles</option>
                                          <option <?php if($row['sucursal'] == "90"){ echo "selected"; } ?> value="90">Central</option>
                                          <option <?php if($row['sucursal'] == "ch"){ echo "selected"; } ?> value="ch">Campo Hermoso</option>
                                          <option <?php if($row['sucursal'] == "cr"){ echo "selected"; } ?> value="cr">Cristo Rey</option>
                                          <option <?php if($row['sucursal'] == "lr"){ echo "selected"; } ?> value="lr">La Rochela</option>
                                          <option <?php if($row['sucursal'] == "st"){ echo "selected"; } ?> value="st">Santagueda</option>
                                      </select>
                                    </div>
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
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <select name="sexo" class="form-control">
                                        <option value="default">Seleccione...</option>
                                        <option <?php if($row['sexo'] == "m"){ echo "selected"; } ?> value="m">Masculino</option>
                                        <option <?php if($row['sexo'] == "f"){ echo "selected"; } ?> value="f">Femenino</option>
                                        <option <?php if($row['sexo'] == "i"){ echo "selected"; } ?> value="i">Indefinido</option>
                                    </select>
                                </div>
                                <input id="check-custom" name="try" type="checkbox" onClick="cambiaValor(this)">
                                <input type="text" name="habeasData" id="checkboxvalidation" hidden>
                                <a class="link-custom" href="https://www.mercaldas.com.co/politica-privacidad" target="_BLANK"> Acepto términos y condiciones.
                                </a>
                                <textarea id="text-custom" cols="30" rows="5" class="form-control" readonly>
                                <?php include 'politicas.php'; ?>
                                </textarea>
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
                    <?php

                        if($_POST){

                            include "conexion_bd.php";

                            # Recolección de datos. 
                            $codigo          = $_POST['codigo'];
                            $nombre          = $_POST['nombre'];
                            $cedula          = $_POST['cedula'];
                            $profesion       = $_POST['profesion'];
                            $empresa         = $_POST['empresa'];
                            $direccion       = $_POST['direccion'];
                            $barrio          = $_POST['barrio'];
                            $email           = $_POST['email'];
                            $telefono        = $_POST['telefono'];
                            $celular         = $_POST['celular'];
                            $fechaCumple     = $_POST['fechaCumple'];
                            $nohijos         = $_POST['nohijos'];
                            $sucursal        = $_POST['sucursal'];
                            $sexo            = $_POST['sexo'];
                            $habeasData      = $_POST['habeasData'];
                            $clubVino        = $_POST['clubVino'];
                            $avvillas        = $_POST['avvillas'];

                            # Conversión de la variable tipo fecha a entero
                            $variable        = strtotime($fechaCumple);
                            
                            # Conversión de la variable tipo fecha a entero
                            $variable        = strtotime($fechaCumple);

                            $date1 = idate('m', $variable);

                            $date2 = idate('d', $variable);

                            if($date2 <= 9 ){
                               $date2 = "0".idate('d', $variable);
                            }

                            $fechaNacimiento = $date1.$date2;

                            # Condicional que los datos no vengan vacios. 
                            if($codigo != "" && $nombre != "" && $cedula != "" && $profesion != "" &&  $empresa != "" &&  $direccion != "" &&  $barrio != "" &&  $email != "" &&  $telefono != "" &&  $celular != "" &&  $fechaNacimiento != "" &&  $nohijos != "" &&  $sucursal != "" &&  $sexo != "default" &&  $habeasData != "" &&  $clubVino != "" &&  $avvillas != ""){

                                # SQL de actualizar los datos.
                                $sql = "UPDATE clientes SET codigo = '$codigo', nombre = '$nombre', cedula = '$cedula', profesion = '$profesion', empresa = '$empresa', direccion = '$direccion', barrio = '$barrio', email = '$email', telefono = '$telefono', celular = '$celular', fechaNacimiento = '$fechaNacimiento', fechaCumple = '$fechaCumple', nohijos = '$nohijos', sucursal = '$sucursal', sexo = '$sexo', habeasData = '$habeasData', clubVino = '$clubVino', avvillas = '$avvillas' WHERE cedula = $cedula";

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
                            
                            # Else del condicional si hay algún campo vacío.
                             } else {
                                  echo "<script>
                                          alert('Hay algún campo vacio, por favor diligencielos');
                                        </script>";
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
   <script src="js/jquery.form-validator.min.js"></script>
   <script>
      $(document).ready(function($){
          $.validate({ form: '#updateForm' });
      });
   </script>
</body>
</html>