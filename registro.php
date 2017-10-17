<?php
  header('Content-type: text/html; charset=utf-8');
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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
                                <input class="form-control" 
                                       placeholder="Nombre completo" 
                                       name="nombre"
                                       id="nombre"
                                       type="text"
                                       data-validation="required"
                                       value="<?php if(isset($_POST['nombre'])){ echo $_POST['nombre']; } ?>">
                            </div>
                            <!-- Cada campo -->
                            <div class="form-group">
                                <input class="form-control" 
                                       placeholder="Cedula" 
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
                                <input class="form-control" 
                                       placeholder="Profesión" 
                                       name="profesion"
                                       id="profesion"
                                       type="text"
                                       data-validation="required"
                                       value="<?php if(isset($_POST['profesion'])){ echo $_POST['profesion']; } ?>">
                            </div>
                            <!-- Cada campo -->
                            <div class="form-group">
                                <input class="form-control" 
                                       placeholder="Empresa donde labora" 
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
                                    <input class="form-control" 
                                           placeholder="Direccion" 
                                           name="direccion"
                                           id="direccion"
                                           type="text"
                                           data-validation="required"
                                           value="<?php if(isset($_POST['direccion'])){ echo $_POST['direccion']; } ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control" 
                                           placeholder="Barrio" 
                                           name="barrio"
                                           id="barrio"
                                           type="text"
                                           data-validation="required"
                                           value="<?php if(isset($_POST['barrio'])){ echo $_POST['barrio']; } ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control" 
                                           placeholder="E-mail" 
                                           name="email"
                                           type="text"
                                           value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control" 
                                           placeholder="Teléfono fijo" 
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
                                    <input class="form-control" 
                                           placeholder="Numero de celular" 
                                           name="celular"
                                           id="celular"
                                           type="number"
                                           data-validation="required"
                                           value="<?php if(isset($_POST['celular'])){ echo $_POST['celular']; } ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control" 
                                           name="fechaCumple"
                                           id="fechaCumple"
                                           type="text"
                                           placeholder="Fecha de nacimiento"
                                           onfocus="(this.type='date')"
                                           data-validation="required"
                                           value="<?php if(isset($_POST['fechaCumple'])){ echo $_POST['fechaCumple']; } ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                    <input class="form-control"
                                           placeholder="Número de hijos" 
                                           name="nohijos"
                                           id="nohijos"
                                           type="number"
                                           data-validation="required"
                                           value="<?php if(isset($_POST['nohijos'])){ echo $_POST['nohijos']; } ?>">
                                </div>
                                <!-- Cada campo -->
                                <div class="form-group">
                                  <select name="sucursal" id="sucursal" class="form-control">
                                      <option value="default">Mercaldas donde realice sus compras...</option>
                                      <option value="0">Electrodomésticos</option>
                                      <option value="1">Centro</option>
                                      <option value="2">Sultana</option>
                                      <option value="3">La fuente</option>
                                      <option value="5">Palmas</option>
                                      <option value="6">Medicamentos</option>
                                      <option value="8">Av. Kevin Angel</option>
                                      <option value="11">Palermo</option>
                                      <option value="12">San José</option>
                                      <option value="14">Calleja</option>
                                      <option value="15">Enea</option>
                                      <option value="16">Villamaria</option>
                                      <option value="33">Neira</option>
                                      <option value="43">Central de Carnes</option>
                                      <option value="50">Versalles</option>
                                      <option value="51">Central de Abarrotes</option>
                                      <option value="52">San Marcel</option>
                                      <option value="53">Cent. Proc. Carnicos</option>
                                      <option value="54">Central Fruver</option>
                                      <option value="55">Suministros</option>
                                      <option value="58">Central de Panaderia</option>
                                      <option value="68">Central Panaderia Versalles</option>
                                      <option value="90">Central</option>
                                      <option value="ch">Campo Hermoso</option>
                                      <option value="cr">Cristo Rey</option>
                                      <option value="lr">La Rochela</option>
                                      <option value="st">Santagueda</option>
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
                                <select name="sexo" id="sexo" class="form-control">
                                    <option value="default">Seleccione su genero...</option>
                                    <option value="m">Masculino</option>
                                    <option value="f">Femenino</option>
                                    <option value="i">Indefinido</option>
                                </select>
                            </div>
                            <input id="check-custom" name="try" type="checkbox" onClick="cambiaValor(this)">
                            <input type="text" name="habeasData" id="checkboxvalidation" hidden>
                            <a class="link-custom" href="https://www.mercaldas.com.co/politica-privacidad" target="_BLANK"> Acepto términos y condiciones.
                            </a>
                            <textarea id="text-custom" cols="30" rows="5" class="form-control" readonly>
                            <?php include 'politicas.php'; ?>
                            </textarea>
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
                                    <button class="button1 btn-info-full next-step-4" id="btn-send">
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
            $insertTable     = $_POST['insertTable'];

            # Conversión de la variable tipo fecha a entero
            $variable        = strtotime($fechaCumple);

            $date1 = idate('m', $variable);

            $date2 = idate('d', $variable);

            if($date2 <= 9 ){
               $date2 = "0".idate('d', $variable);
            }

            $fechaNacimiento = $date1.$date2;

            # Condicional que los datos no vengan vacios. 
            if($codigo != "" && $nombre != "" && $cedula != "" && $profesion != "" &&  $empresa != "" &&  $direccion != "" &&  $barrio != "" &&  $email != "" &&  $telefono != "" &&  $celular != "" &&  $fechaCumple != "" &&  $nohijos != "" &&  $sucursal != "" &&  $sexo != "default" &&  $habeasData != "0" &&  $clubVino != "" &&  $avvillas != ""){

              $sql = "INSERT INTO clientes VALUES('$codigo', '$nombre', '$cedula', '$profesion', '$empresa', '$direccion', '$barrio', '$email', '$telefono', '$celular', '$fechaNacimiento', '$fechaCumple', '$nohijos', '$sucursal', '$sexo', '$habeasData', '$clubVino', '$avvillas')";

                if(mysqli_query($con, $sql)){
                  echo "<script>
                          alert('Se insertó con éxito');
                          location.replace('login.php');
                        </script>";
                } else {
                  echo "<script>
                          alert('Ocurrió un error al insertar. Por favor vuelva a intentarlo');
                          location.replace('registro.php');
                        </script>";
                }
            } else {
              echo "<script>
                      alert('Campos vacíos o nulos, por favor completarlos');
                   </script>";
            }
          }
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/jquery.form-validator.min.js"></script>
    <script>
      $(document).ready(function($){
          $.validate({ form: '#form-register' });
      });
    </script>
  </body>
</html>