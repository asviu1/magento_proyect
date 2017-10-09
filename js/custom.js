$(window).load(function(){
    $('#onload').modal('show');
});
setTimeout(function(){
  $('.modal').modal('hide')
}, 10000);


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
            alert('Hay campos vacíos, por favor completelos.');
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
        var email      = $("#email").val();
        var telefono   = $("#telefono").val();
        // Validación si las variables están vacías
        if( direccion == "" || barrio == "" || email == "" || telefono == ""){
            alert('Hay campos vacíos, por favor completelos.');
        } else {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        }
    });

    // Bótón 3 de avanzar en el formulario
     $(".next-step-3").click(function (e) {
        // Declaracion de las variables que toman el valor del campo. 
        var celular     = $("#celular").val();
        var fechaCumple = $("#fechaCumple").val();
        var nohijos     = $("#nohijos").val();
        var sexo        = $("#sexo").val();
        // Validación si las variables están vacías
        if( celular == "" || fechaCumple == "" || nohijos == "" || sexo == "default"){
            alert('Hay campos vacíos, por favor completelos.');
        } else {
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