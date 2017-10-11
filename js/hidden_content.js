$(document).ready(function($) {
	// Switcheo de mostrar/ocultar contenido.
	// Primer botón
	$('#archivoOpen').click(function(event) {
		$('#archivoOpen').hide();
		$('#form-archivo').css({
			display: 'inline-block'
		});
		$('#archivoClose').show();
	});
	$('#archivoClose').click(function(event) {
		$('#form-archivo').hide();
		$('#archivoClose').hide();
		$('#archivoOpen').show();
	}); 
	// Segundo botón
	$('#cronojobOpen').click(function(event) {
		$('#cronojobOpen').hide();
		$('#form-crono').css({
			display: 'inline-block'
		});
		$('#cronojobClose').show();
	});
	$('#cronojobClose').click(function(event) {
		$('#form-crono').hide();
		$('#cronojobClose').hide();
		$('#cronojobOpen').show();
	});
	// Tercer botón
	$('#puntosOpen').click(function(event) {
		$('#puntosOpen').hide();
		$('#form-search').css({
			display: 'inline-block'
		});
		$('#puntosClose').show();
	});
	$('#puntosClose').click(function(event) {
		$('#form-search').hide();
		$('#puntosClose').hide();
		$('#puntosOpen').show();
	});
	// Cuarto botón (Actualizar info)
	$('#openActualizar').click(function(event) {
		$('#openActualizar').hide();
		$('#form-update').css({
			display: 'inline-block'
		});
		$('#closeActualizar').show();
	});
	$('#closeActualizar').click(function(event) {
		$('#form-update').hide();
		$('#closeActualizar').hide();
		$('#openActualizar').show();
	});
	// Botón de la segmentacion
	$('#segmOpen').click(function(event) {
		$('#segmOpen').hide();
		$('#form-segmentacion').css({
			display: 'inline-block'
		});
		$('#segmClose').show();
	});
	$('#segmClose').click(function(event) {
		$('#form-segmentacion').hide();
		$('#segmClose').hide();
		$('#segmOpen').show();
	});
});