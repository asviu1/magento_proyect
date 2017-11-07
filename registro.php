<?php
  session_start();

  include "conexion_bd.php";

  $query = mysqli_query($con, "SELECT ganaMercaldas FROM reglamento WHERE id = 1");
  $row = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrarse</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="imgs/favicon.png" type="img/png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link href="css/custom.css" rel="stylesheet">
    <script type="text/javascript">
        function cambiaValor(valor){
            if(valor.checked){
                document.registerform.habeasData.value=1;
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
        <a href="index.php" class="btn btn-success a-home">
            <i class="fa fa-arrow-left"></i>
            Volver
        </a>
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
                                       value="<?php if(isset($_POST['nombre'])){ echo $_POST['nombre']; } ?>">
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
                                       <?php if (isset($_SESSION['cedula'])): ?>
                                       value="<?= $_SESSION['cedula'] ?>"
                                       <?php endif ?>
                                       id="cedula"
                                       type="number"
                                       data-validation="required"
                                       value="<?php if(isset($_POST['cedula'])){ echo $_POST['cedula']; } ?>">
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
                                       value="<?php if(isset($_POST['profesion'])){ echo $_POST['profesion']; } ?>">
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
                                       value="<?php if(isset($_POST['empresa'])){ echo $_POST['empresa']; } ?>">
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
                                           value="<?php if(isset($_POST['direccion'])){ echo $_POST['direccion']; } ?>">
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
                                           value="<?php if(isset($_POST['barrio'])){ echo $_POST['barrio']; } ?>">
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
                                           value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
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
                                           value="<?php if(isset($_POST['telefono'])){ echo $_POST['telefono']; } ?>">
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
                                           value="<?php if(isset($_POST['celular'])){ echo $_POST['celular']; } ?>">
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
                                           value="<?php if(isset($_POST['nohijos'])){ echo $_POST['nohijos']; } ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                  <label for="sucursal">
                                      <i class="fa fa-university"></i>
                                      Sucursal donde realiza sus compras
                                  </label>
                                  <select name="sucursal" id="sucursal" class="form-control">
                                      <option value="default">Seleccione una opcion...</option>
                                      <option value="8">Av. Kevin Angel</option>
                                      <option value="ch">Campohermoso</option>
                                      <option value="1">Centro</option>
                                      <option value="cr">Cristo Rey</option>
                                      <option value="0">Electrodomésticos</option>
                                      <option value="14">La Calleja</option>
                                      <option value="15">La Enea</option>
                                      <option value="3">La Fuente</option>
                                      <option value="lr">La Rochela</option>
                                      <option value="5">Las Palmas</option>
                                      <option value="33">Neira</option>
                                      <option value="11">Palermo</option>
                                      <option value="52">San Marcel</option>
                                      <option value="st">Santágueda</option>
                                      <option value="2">Sultana</option>
                                      <option value="50">Versalles</option>
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
                                    <option value="M">Masculino</option>
                                    <option value="F">Femenino</option>
                                    <option value="I">Indefinido</option>
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
                            <textarea id="text-custom" cols="30" rows="5" class="form-control" readonly><?php echo utf8_decode($row['ganaMercaldas'])?></textarea>
                            <!-- Campo oculto que después se reemplaza -->
                            <input class="form-control" value="00" name="clubVino" type="hidden">
                            <!-- Campo oculto que después se reemplaza -->
                            <input class="form-control" value="00" name="avvillas" type="hidden">
                            <!-- ********************************************** -->
                            <!-- Campo oculto para insertar en la otra tabla... -->
                            <!-- ********************************************** -->
                            <input class="form-control" name="insertTable" value="<?php echo date("F j, Y, g:i a"); ?>" type="hidden">
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
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/all.js"></script>
<script src="js/jquery.form-validator.min.js"></script>
<script>
  $(document).ready(function($){
      $.validate({ form: '#form-register' });
  });
</script>
      <?php

        if($_POST){

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

          if($ano <= 1999){

              # Condicional que los datos no vengan vacios. 
              if($codigo != "" && $nombre != "" && $cedula != "" && $profesion != "" &&  $empresa != "" &&  $direccion != "" &&  $barrio != "" &&  $telefono != "" &&  $celular != "" &&  $dia != "default" &&  $mes != "default" &&  $ano != "" &&  $nohijos != "" &&  $sucursal != "" &&  $sexo != "default" &&  $habeasData != "0" &&  $clubVino != "" &&  $avvillas != ""){

                // Concatenación de las dos variables para que nazca la contraseña
                $fechaNacimiento = $mes.$dia;

                // Concatenación de variables para que se almacene en la BD 
                $fechaCumple = $ano.'-'.$mes.'-'.$dia;

                $sql = "INSERT INTO clientes VALUES('$codigo', '$nombre', '$cedula', '$profesion', '$empresa', '$direccion', '$barrio', '$email', '$telefono', '$celular', '$fechaNacimiento', '$fechaCumple', '$nohijos', '$sucursal', '$sexo', '$habeasData', '$clubVino', '$avvillas')";

                    if(mysqli_query($con, $sql)){

                          #Inserción en la tabla de clientes nuevos para tener seguimiento
                          $sql2 = "INSERT INTO clientesnuevos VALUES('$codigo', '$nombre', '$cedula', '$profesion', '$empresa', '$direccion', '$barrio', '$email', '$telefono', '$celular', '$fechaNacimiento', '$fechaCumple', '$nohijos', '$sucursal', '$sexo', '$habeasData', '$clubVino', '$avvillas')";

                          $query = mysqli_query($con, $sql2);

                           // Validación de si insertó con éxito
                          echo "<script>
                                  alert('Se insertó con éxito');
                                  location.replace('login.php');
                                </script>";
                    } else {
                      echo "<script>
                              alertify.error('Ocurrió un error al insertar. Por favor vuelva a intentarlo');
                            </script>";
                    }
                } else {
                      echo "<script>
                              alertify.error('Campos vacíos por favor valide de nuevo');
                            </script>";
                  }
            } else {
                      echo "<script>
                              alertify.alert('Recuerda que debes ser mayor de edad para poder registrarte');
                            </script>";
              }

          }
  ?>
</body>
</html>