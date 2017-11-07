<?php
  if($_GET){

        header('Content-type: text/html; charset=utf-8');
        include "conexion_bd.php";
        
        #Consulta del campo de los terminos y condiciones para imprimir en la variable
        $query = mysqli_query($con, "SELECT ganaMercaldas FROM reglamento WHERE id = 1");
        $row2 = mysqli_fetch_array($query);

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
        } else {
            session_start();
        }

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
    <script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/custom.js"></script>
    <script type="text/javascript">
        function cambiaValor(valor){
            if(valor.checked){
                document.registerform.habeasData.value=1;
            }
        }
    </script>
</head>
<body onload="iniciar()" onkeypress="detener()" onclick="detener()" onmousemove="detener()">
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
          <h2 class="green-text text-center"><span><img src="imgs/icon-4.png"></span>Registro Mercaldas</h2>
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
                            <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Paso 4">
                                <span class="round-tab">
                                    4
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <form role="form" method="post" id="form-register" name="registerform" autocomplete="off">
                    <div class="tab-content">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                          <div class="form">
                             <!-- Campo oculto que después se reemplaza -->
                            <input class="form-control" value="000000" name="codigo" type="hidden">
                            <!-- Cada campo -->
                            <div class="form-group">
                                <label for="nombre">
                                    <i class="fa fa-user-circle"></i>
                                    Nombre
                                </label>
                                <input class="form-control obligatorio" 
                                       placeholder="Este campo es obligatorio *" 
                                       name="nombre"
                                       id="nombre"
                                       type="text"
                                       data-validation="required"
                                       value="<?= $row['nombre']; ?>">
                            </div>
                            <!-- Cada campo -->
                            <div class="form-group">
                                <label for="cedula">
                                  <i class="fa fa-address-book"></i>
                                  Documento
                                </label>
                                <input class="form-control obligatorio" 
                                       placeholder="Este campo es obligatorio *" 
                                       name="cedula"
                                       value="<?= $row['cedula'] ?>"
                                       id="cedula"
                                       type="number"
                                       data-validation="required"
                                       readonly>
                            </div>
                            <!-- Cada campo -->
                            <div class="form-group">
                                <label for="profesion">
                                    <i class="fa fa-graduation-cap"></i>
                                    Profesion
                                </label>
                                <input class="form-control obligatorio" 
                                       placeholder="Este campo es obligatorio *" 
                                       name="profesion"
                                       id="profesion"
                                       type="text"
                                       data-validation="required"
                                       value="<?= $row['profesion'] ?>">
                            </div>
                            <!-- Cada campo -->
                            <div class="form-group">
                                <label for="empresa">
                                    <i class="fa fa-home"></i>
                                    Empresa
                                </label>
                                <input class="form-control obligatorio" 
                                       placeholder="Este campo es obligatorio *" 
                                       name="empresa"
                                       id="empresa"
                                       type="text"
                                       data-validation="required"
                                       value="<?= $row['empresa'] ?>">
                            </div>
                          </div>
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" id="btn-next" class="button1 next-step">Siguiente</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2">
                            <div class="form">
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <label for="direccion">
                                        <i class="fa fa-map-signs"></i>
                                        Dirección
                                      </label>
                                    <input class="form-control obligatorio" 
                                           placeholder="Este campo es obligatorio *" 
                                           name="direccion"
                                           id="direccion"
                                           type="text"
                                           data-validation="required"
                                           value="<?= $row['direccion'] ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                     <label for="barrio">
                                        <i class="fa fa-map"></i>
                                        Barrio
                                      </label>
                                    <input class="form-control obligatorio" 
                                           placeholder="Este campo es obligatorio *" 
                                           name="barrio"
                                           id="barrio"
                                           type="text"
                                           data-validation="required"
                                           value="<?= $row['barrio'] ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <label for="email">
                                      <i class="fa fa-envelope"></i>
                                      Correo electrónico
                                    </label>
                                    <input class="form-control"
                                           placeholder="E-mail" 
                                           name="email"
                                           type="text"
                                           value="<?= $row['email'] ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <label for="telefono">
                                      <i class="fa fa-phone"></i>
                                      Teléfono fijo
                                    </label>
                                    <input class="form-control obligatorio" 
                                           placeholder="Este campo es obligatorio *" 
                                           name="telefono" 
                                           id="telefono" 
                                           type="number"
                                           data-validation="required"
                                           value="<?= $row['telefono'] ?>">
                                </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="button1 prev-step">Anterior</button></li>
                                <li><button type="button" class="button1 next-step-2">Siguiente</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step3">
                            <div class="form">
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <label for="celular">
                                      <i class="fa fa-mobile"></i>
                                      Celular
                                    </label>
                                    <input class="form-control obligatorio" 
                                           placeholder="Este campo es obligatorio *" 
                                           name="celular"
                                           id="celular"
                                           type="number"
                                           data-validation="required"
                                           value="<?= $row['celular'] ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <label for="fechaCumple" class="widthFull">
                                      <i class="fa fa-calendar"></i>
                                      Fecha de nacimiento
                                    </label>
                                    <!-- Día de nacimiento -->
                                    <!-- ***************** -->
                                    <select name="dia" class="form-control personal-control">
                                      <option value="default">Día</option>
                                      <option value="01">1</option>
                                      <option value="02">2</option>
                                      <option value="03">3</option>
                                      <option value="04">4</option>
                                      <option value="05">5</option>
                                      <option value="06">6</option>
                                      <option value="07">7</option>
                                      <option value="08">8</option>
                                      <option value="09">9</option>
                                      <option value="10">10</option>
                                      <option value="11">11</option>
                                      <option value="12">12</option>
                                      <option value="13">13</option>
                                      <option value="14">14</option>
                                      <option value="15">15</option>
                                      <option value="16">16</option>
                                      <option value="17">17</option>
                                      <option value="18">18</option>
                                      <option value="19">19</option>
                                      <option value="20">20</option>
                                      <option value="21">21</option>
                                      <option value="22">22</option>
                                      <option value="23">23</option>
                                      <option value="24">24</option>
                                      <option value="25">25</option>
                                      <option value="26">26</option>
                                      <option value="27">27</option>
                                      <option value="28">28</option>
                                      <option value="29">29</option>
                                      <option value="30">30</option>
                                      <option value="31">31</option>
                                    </select>
                                    <!-- Mes de nacimiento -->
                                    <!-- ***************** -->
                                    <select name="mes" class="form-control personal-control">
                                      <option value="default">Mes</option>
                                      <option value="1">Enero</option>
                                      <option value="2">Febrero</option>
                                      <option value="3">Marzo</option>
                                      <option value="4">Abril</option>
                                      <option value="5">Mayo</option>
                                      <option value="6">Junio</option>
                                      <option value="7">Julio</option>
                                      <option value="8">Agosto</option>
                                      <option value="9">Septiembre</option>
                                      <option value="10">Octubre</option>
                                      <option value="11">Noviembre</option>
                                      <option value="12">Diciembre</option>
                                    </select>
                                    <!-- Año de nacimiento -->
                                    <!-- ***************** -->
                                    <input type="number" name="ano" class="form-control personal-control" placeholder="Año">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <label for="nohijos">
                                      <i class="fa fa-users"></i>
                                      Número de hijos
                                    </label>
                                    <input class="form-control obligatorio"
                                           placeholder="Este campo es obligatorio *" 
                                           name="nohijos"
                                           id="nohijos"
                                           type="number"
                                           data-validation="required"
                                           value="<?= $row['nohijos'] ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                  <label for="sucursal">
                                      <i class="fa fa-university"></i>
                                      Sucursal donde realiza sus compras
                                  </label>
                                  <select name="sucursal" id="sucursal" class="form-control">
                                      <option value="default">Seleccione una opcion...</option>
                                      <option <?php if($row['sucursal'] == '8'){ echo 'selected';} ?> value="8">Av. Kevin Angel</option>
                                      <option <?php if($row['sucursal'] == 'ch'){ echo 'selected';} ?> value="ch">Campohermoso</option>
                                      <option <?php if($row['sucursal'] == '1'){ echo 'selected';} ?> value="1">Centro</option>
                                      <option <?php if($row['sucursal'] == 'cr'){ echo 'selected';} ?> value="cr">Cristo Rey</option>
                                      <option <?php if($row['sucursal'] == '0'){ echo 'selected';} ?> value="0">Electrodomésticos</option>
                                      <option <?php if($row['sucursal'] == '14'){ echo 'selected';} ?> value="14">La Calleja</option>
                                      <option <?php if($row['sucursal'] == '15'){ echo 'selected';} ?> value="15">La Enea</option>
                                      <option <?php if($row['sucursal'] == '3'){ echo 'selected';} ?> value="3">La Fuente</option>
                                      <option <?php if($row['sucursal'] == 'lr'){ echo 'selected';} ?> value="lr">La Rochela</option>
                                      <option <?php if($row['sucursal'] == '5'){ echo 'selected';} ?> value="5">Las Palmas</option>
                                      <option <?php if($row['sucursal'] == '33'){ echo 'selected';} ?> value="33">Neira</option>
                                      <option <?php if($row['sucursal'] == '11'){ echo 'selected';} ?> value="11">Palermo</option>
                                      <option <?php if($row['sucursal'] == '52'){ echo 'selected';} ?> value="52">San Marcel</option>
                                      <option <?php if($row['sucursal'] == 'st'){ echo 'selected';} ?> value="st">Santágueda</option>
                                      <option <?php if($row['sucursal'] == '2'){ echo 'selected';} ?> value="2">Sultana</option>
                                      <option <?php if($row['sucursal'] == '50'){ echo 'selected';} ?> value="50">Versalles</option>
                                  </select>
                              </div>
                            </div>
                            <ul class="list-inline pull-right">
                                <li><button type="button" class="button1 prev-step">Anterior</button></li>
                                <li><button type="button" class="button1 next-step-3">Siguiente</button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="complete">
                            <div class="form-group">
                                <label for="sexo">
                                    <i class="fa fa-mars-double"></i>
                                    Genero
                                </label>
                                <select name="sexo" id="sexo" class="form-control">
                                    <option value="default">Seleccione su genero...</option>
                                    <option <?php if($row['sexo'] == 'M' || $row['sexo'] == 'm'){ echo 'selected';} ?> value="M">Masculino</option>
                                    <option <?php if($row['sexo'] == 'F' || $row['sexo'] == 'f'){ echo 'selected';} ?> value="F">Femenino</option>
                                    <option <?php if($row['sexo'] == 'I' || $row['sexo'] == 'i'){ echo 'selected';} ?> value="I">Indefinido</option>
                                </select>
                            </div>
                             <label for="check-custom">
                                <i class="fa fa-paragraph"></i>
                                Terminos y condiciones
                              </label><br>
                            <input id="check-custom" name="try" type="checkbox" onClick="cambiaValor(this)">
                            <input type="text" name="habeasData" id="checkboxvalidation" hidden>
                            <a class="link-custom" href="https://www.mercaldas.com.co/politica-privacidad" target="_BLANK"> Acepto términos y condiciones.
                            </a>
                            <textarea id="text-custom" cols="30" rows="5" class="form-control" readonly><?php echo utf8_decode($row2['ganaMercaldas'])?></textarea>
                            <!-- Campo oculto que después se reemplaza -->
                            <input class="form-control" value="00" name="clubVino" type="hidden">
                            <!-- Campo oculto que después se reemplaza -->
                            <input class="form-control" value="00" name="avvillas" type="hidden">
                            <!-- ********************************************** -->
                            <!-- Campo oculto para insertar en la otra tabla... -->
                            <!-- ********************************************** -->
                            <ul class="list-inline pull-right">
                                <li>
                                    <button type="button" class="button1 prev-step">Anterior</button>
                                </li>
                                <li>
                                    <button type="button" class="button1 btn-info-full next-step-4" id="btn-send">
                                        <i class="fa fa-send"></i>
                                        &nbsp Enviar
                                    </button>
                                </li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </section>
    </div>
  </div>
  <!-- ************************************ -->
  <!-- Ventana modal para el tiempo vencido -->
  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  id="onload">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-body text-center">
          <button class="btn-danger-custom" id="closeModal">
            <i class="fa fa-times"></i>
          </button>
           <p>Sesión cerrada por inactividad</p>
           <p>¡Gracias por visitarnos te esperamos pronto!</p>
           <img class="img-responsive center-block" src="imgs/logo.png">
          </div>
         
        </div>
      </div>
  </div>
  <!-- ************************************ -->
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery.form-validator.min.js"></script>
   <script src="js/all.js"></script>
   <script>
      $(document).ready(function($){
          $.validate({ form: '#updateForm' });
      });
   </script>
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
            $dia             = $_POST['dia'];
            $mes             = $_POST['mes'];
            $ano             = $_POST['ano'];
            $nohijos         = $_POST['nohijos'];
            $sucursal        = $_POST['sucursal'];
            $sexo            = $_POST['sexo'];
            $habeasData      = $_POST['habeasData'];
            $clubVino        = $_POST['clubVino'];
            $avvillas        = $_POST['avvillas'];
            
            
            # Condicional que los datos no vengan vacios. 
            if($codigo != "" && $nombre != "" && $cedula != "" && $profesion != "" &&  $empresa != "" &&  $direccion != "" &&  $barrio != "" &&  $telefono != "" &&  $celular != "" &&  $dia != "" &&  $mes != "" &&  $ano != "" &&  $nohijos != "" &&  $sucursal != "" &&  $sexo != "default" &&  $habeasData != "" &&  $clubVino != "" &&  $avvillas != ""){
                
                $fechaNacimiento = $mes.$dia;
                $fechaCumple     = $ano.'-'.$mes.'-'.$dia;
                
                # SQL de actualizar los datos.
                $sql = "UPDATE clientes SET codigo = '$codigo', nombre = '$nombre', cedula = '$cedula', profesion = '$profesion', empresa = '$empresa', direccion = '$direccion', barrio = '$barrio', email = '$email', telefono = '$telefono', celular = '$celular', fechaNacimiento = '$fechaNacimiento', fechaCumple = '$fechaCumple', nohijos = '$nohijos', sucursal = '$sucursal', sexo = '$sexo', habeasData = '$habeasData', clubVino = '$clubVino', avvillas = '$avvillas' WHERE cedula = $cedula";

                  #Condicional si fué efectuoso el actualizar los datos
                  if(mysqli_query($con, $sql)){
                      echo "<script>
                              alert('Cambios guardados con éxito');
                              location.replace('dashboard.php');
                            </script>";
                  }
                  
            # Else del condicional si hay algún campo vacío.
             } else {
                  echo "<script>
                          alertify.error('Hay algún campo vacio, por favor diligencielos');
                        </script>";
              }
        }

  ?>
</body>
</html>