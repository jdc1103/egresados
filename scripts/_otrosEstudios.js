function inicio2(){
	var idPersona = json.id;
	$('#_eBasica').dialog({
		title: "Educación Basica",
		modal:true,
		autoOpen:false
	});
	$('#_eSuperior').dialog({
		title: "Educación Superior",
		modal:true,
		autoOpen:false
	});

	$('#fEgreso, #fIngreso').datepicker({
		dateFormat: 'yy-mm-dd',
	      changeMonth: true,
    	  changeYear: true
	});

	$('.bloque, input[type=submit]').css({
		display: 'block',
		margin: "auto"
	});
	$('#estudiando').hide();
	$('input[name=estudia]').click(function(event) {
		if($(this).val() == "si"){
			/*$('.bloque, input[type=submit]').css({
				display: 'inline-table',
				margin: "20px "
			});*/
			$('#estudiando').show('slide');
		}else{
			/*$('.bloque, input[type=submit]').css({
				display: 'block',
				margin: "auto"
			});*/
			$('#estudiando').hide('slide');
		}
	});
}


function llenarSelect(a,res,id){
	var data = JSON.parse(res);
	var opt = new Array();
	for (var i = 0; i < data.tabla.length; i++) {
		opt[i] = $('<option/>',{
			'text':data.tabla[i].nombre,
			'value':data.tabla[i].id
		});
	}
	switch(a){
		case 'Pais':
			$('#sPaisR').html(opt);
			$("#sPaisR option[value="+id+"]").attr("selected",true);
			break;
		case 'Departamento':
			$('#sDepR').html(opt);
			$("#sDepR option[value="+id+"]").attr("selected",true);
			break;
		case 'Municipio':
			$('#sMunR').html(opt);
			$("#sMunR option[value="+id+"]").attr("selected",true);
			break;
		case 'DropPais2':
			$('#sDepartamento').html(opt);
			break;
	}
}