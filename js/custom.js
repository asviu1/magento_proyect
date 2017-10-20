$(document).ready(function () {
    $('#onload').modal('hide');
});
setTimeout(function(){
  $('.modal').modal('show');
  $('#closeModal, #onload').click(function(event) {
    location.replace('cerrar_session.php');
  });
}, 60000);


 $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    // Bótón 1 de avanzar en el formulario
    $(".next-step").click(function (e) {

        // Declaracion de las variables que toman el valor del campo. 
        var nombre    = $("#nombre").val();
        var cedula    = $("#cedula").val();
        var profesion = $("#profesion").val();
        var empresa   = $("#empresa").val();
        // Validación si las variables están vacías
        if( nombre == "" || cedula == "" || profesion == "" || empresa == ""){
            alertify.error('Hay campos vacíos, por favor completelos');
        } else {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
    });

    // Bótón 2 de avanzar en el formulario
     $(".next-step-2").click(function (e) {
        // Declaracion de las variables que toman el valor del campo. 
        var direccion  = $("#direccion").val();
        var barrio     = $("#barrio").val();
        var telefono   = $("#telefono").val();
        // Validación si las variables están vacías
        if( direccion == "" || barrio == "" || telefono == ""){
            alertify.error('Hay campos vacíos, por favor completelos');
        } else {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
    });

    // Bótón 3 de avanzar en el formulario
     $(".next-step-3").click(function (e) {
        
        //Declaracion de las variables que toman el valor del campo. 
        var celular     = $("#celular").val();
        var fechaCumple = $("#fechaCumple").val();
        var nohijos     = $("#nohijos").val();
        var sucursal    = $("#sucursal").val();
        // Validación si las variables están vacías
        if( celular == "" || fechaCumple == "" || nohijos == "" || sucursal == "default"){
            alertify.error('Hay campos vacíos, por favor completelos');
        } else {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
    });

    // Bótón 4 de avanzar en el formulario
     $(".next-step-4").click(function (e) {
        
        // Declaracion de las variables que toman el valor del campo. 
        var sexo               = $("#sexo").val();
        var checkboxvalidation = $("#checkboxvalidation").val();
        // Validación si las variables están vacías
        if( sexo == "" || checkboxvalidation == ""){
            $("#btn-send").prop("type", "button");
            alertify.error('Por favor diligencie los campos y acepte los términos de contrato');
        } else {
            $("#btn-send").prop("type", "submit");
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
    });

    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}