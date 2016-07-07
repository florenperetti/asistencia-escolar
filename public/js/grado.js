var $panelListaAlumnos = $('.lista'),
	$panelAsignarAlumno = $('.asignar'),
	$panelNuevoAlumno = $('.nuevo');

$(function() {
	$("#btn-ver").click(function(e){
		e.preventDefault();
		togglePanel($panelListaAlumnos);
	});
	$("#btn-asignar").click(function(e){
		e.preventDefault();
		togglePanel($panelAsignarAlumno);
	});
	$("#btn-nuevo").click(function(e){
		e.preventDefault();
		togglePanel($panelNuevoAlumno);
	});
	initAC();

	$('body').on('click', '#confirmar .cancelar', function(){
		$(this).parent().fadeOut('fast', function() {
			$(this).remove();
		});
	});
	$("#btn-confirmar").click(function(e){
		var $alumnos = $('#confirmar').find('>span');

		if ($alumnos.length > 0) {
			var ids = [];
			for (var i = 0; i < $alumnos.length; i++) {
				ids.push($alumnos.eq(i).data('id'));
			};

			$.ajax({
				url: '/grado/alumnos',
				headers: {'X-CSRF-TOKEN': $("input[name=_token]").val() },
				data: { alumnos : ids, grado : idGrado },
				dataType: "json",
				type: 'post',
				success: function(data) {
					$('html').html(data);
				},
				error: {
					
				}
			});
		}
	});
});

function initAC() {
	var $formConfirmar = $('#confirmar');
	$('#autoAlumnos').autocomplete({
		minLength:2,
		source: function(request, response) {
			$.ajax({
				url: '/getAlumnos',
				headers: {'X-CSRF-TOKEN': $("#token").val() },
				data: { 'term' : $('#autoAlumnos').val(), 'idGrado' : idGrado },
				dataType: "json",
				type: 'post',
				success: function(data) {
					response(data);
				}
			});
		},
		select: function( event, ui ) {
			event.preventDefault();
			$formConfirmar.append('<span data-id="'+ui.item.id+'">'+ui.item.value+'<span class="fa fa-close cancelar"></span></span>');
		    this.value = "";
			//$('#idCliente').val(ui.item.id);
			//$('#autoCliente').val(ui.item.value);
		}
	});
}

function togglePanel($panel) {
	$panelListaAlumnos.slideUp();
	$panelNuevoAlumno.slideUp();
	$panelAsignarAlumno.slideUp();
	$panel.slideToggle();
}