//var pais, dep, ciu, sede, titulo;
var update = true;
var idSede;
var cambio;
var array = new Array();
function inicio(){
	$( document ).tooltip();
	$('input:required').attr('placeholder', 'Campo Obligatorio');
	$('input[type=button], input:submit').button();
	$('#_dPersonales').show('slide');
	$('input:radio').button();
	$('#btIdioma').button();
	$('nav a').button();
	$('#cPass').click(function(event) {
		$('#cPassD').dialog('open');
	});
	$('#btIdioma').click(function(event) {
		$('#idiomas').dialog('open');
	});
	$('#idiomas').dialog({
		title: "Idiomas",
		modal:true,
		autoOpen:false,
		width:150
	});
	$('#cPassD').dialog({
		autoOpen: false, 
		title:"Cambiar contraseña",
		modal: true,
		width: 370,
		open: function(){
			$('#cPassD form input:not(#btCpass)').val("");
		}
	})
	$('#addOE').dialog({
		title: "Agregar estudio",
		modal:true,
		autoOpen:false,
		width: 350,
		open:function(){
			$('#addOE input:text').val("");
			$('#addOE select option:first').attr('selected', true);
			$('#addOE select:not(#sPais2)').html("");
		}
	});
	$('#addIL').dialog({
		title: "Agregar empleo",
		modal:true,
		autoOpen:false,
		open:function(){
			$('#addIL input:text').val("");
		},
		close:function(){
			$('#addIL #sEmpresa').html("");
		},
		width: 350
	});
 	limpiarCheckbox();
	$.post("includes/procesos.php",{op:"idiomas",id:json.id},function(res){
		$.each(JSON.parse(res), function(index, val) {
			$('input[value='+val+']').attr('checked', 'true');;
			limpiarCheckbox();
		});
	});
	
	var car = new Array();
	$.post("includes/procesos.php",{op:"soloNombre",tabla:"cargos"},function(res){
		$.each(JSON.parse(res), function(index, val) {
			car[index] = val;
		});
	});
	$('#cargos').autocomplete({
		source:car,
		change: verificarAutocomplete
		//minLength: 3
	});
	$('#_eBasica').dialog({
		title: "Educación Basica",
		modal:true,
		autoOpen:false,
		width: 350
	});
	$('#_eSuperior').dialog({
		title: "Educación Superior",
		modal:true,
		autoOpen:false,
		width: 400
	});
	$('input[class=fecha]').datepicker({
		dateFormat: 'yy-mm-dd',
	    changeMonth: true,
    	changeYear: true,
    	yearRange: "1940:2014"
	});
	$('input:radio').click(function(event) {
		menuP($(this));
	});
	//-------    llenar campos datos personales
	$('#pApellido').val(json.pri_ape);
	$('#sApellido').val(json.seg_ape);
	$('#priNom').val(json.pri_nom);
	$('#segNom').val(json.seg_nom);
	$('#cedula').val(json.num_doc);
	$('#fNacimiento').val(json.fechanacimiento);
	$("#sTipoDoc option[value="+json.tipo_doc+"]").attr("selected",true);
	$("#sGenero option[value="+json.genero+"]").attr("selected",true);
	$("#sEstadoCivil option[value="+json.id_est_civ+"]").attr("selected",true);
	$('#sDepR').val(json.departamento);
	$('#sMunR').val(json.ciudad);
	$('#sPaisR').val(json.pais);
	$('#telefono').val(json.telefono);
	$('#celular').val(json.celular);
	$('#tDirR').val(json.direccion);
	$('#correo').val(json.correo);
	$.post("includes/procesos.php",{op:"json",tabla:"paises"},function(res){llenarSelect("Pais",res,json.id_pais)});
	$.post("includes/procesos.php",{op:"json",tabla:"departamentos",cW:"id_pais",idW:json.id_pais},function(res){llenarSelect("Departamento",res,json.id_dep)});
	$.post("includes/procesos.php",{op:"json",tabla:"ciudades",cW:"id_dpto",idW:json.id_dep},function(res){llenarSelect("Municipio",res,json.id_ciu)});

	//fin llenar campos
	$('input[type=checkbox').click(function(event) {
		limpiarCheckbox();
		if($(this).is(":checked")){
			$.post('includes/procesos.php',{op:"updateIdiomas",add:true,idioma:$(this).val(),id:json.id}, function(data, textStatus, xhr) {
				
			});
		}else{
			$.post('includes/procesos.php',{op:"updateIdiomas",add:false,idioma:$(this).val(),id:json.id}, function(data, textStatus, xhr) {
				
			});
		}
	});
	
	$('#sPaisR').change(function(event) {
		id = $(this).val();
		$.post("includes/procesos.php",{op:"json",tabla:"departamentos",cW:"id_pais",idW:id},function(res){
			llenarSelect("Departamento",res,0);
		});
	});
	$('#sDepR').change(function(event) {
		id = $(this).val();
		$.post("includes/procesos.php",{op:"json",tabla:"ciudades",cW:"id_dpto",idW:id},function(res){
			llenarSelect("Municipio",res,0);
		});
	});
	$('[name=sPais]').change(function(event) {
		//if (update) {
			id = $(this).val();
			$.post("includes/procesos.php",{op:"json",tabla:"departamentos",cW:"id_pais",idW:id},function(res){
				llenarSelect("depEB",res,0);
			});			
		//}
	});
	$('[name=sDep]').change(function(event) {
		//if (update) {
			id = $(this).val();
			$.post("includes/procesos.php",{op:"json",tabla:"ciudades",cW:"id_dpto",idW:id},function(res){
				llenarSelect("munEB",res,0);
			});
		//}		
	});
	$('[name=sMun]').change(function(event) {
		//if (update) {
			id = $(this).val();
			if(cambio == "laboral"){
				//$('.cargando').css('top', ''+($('#fIngreso3').position()).left);
				
				$('.cargando').show();
				$.post("includes/procesos.php",{op:"json",tabla:"sedesemps",cW:"id_lugar",idW:id},function(res){
					llenarSelect("empresa",res,0);
					$('.cargando').hide();
				});
			}else if(cambio == "otrosE"){
				$.post("includes/procesos.php",{op:"json",tabla:"sedes",cW:"id_ciudad",idW:id, ins:"1"},function(res){
					llenarSelect("sedeEB",res,0);
				});
			}else {
				$.post("includes/procesos.php",{op:"json",tabla:"sedes",cW:"id_ciudad",idW:id, ins:"2"},function(res){
					llenarSelect("sedeEB",res,0);
				});
			}
			
		//};
	});
	$('#salir').click(function() {
		$.post('includes/procesos.php', {op:"cerrarSesion"}, function(data, textStatus, xhr) {
			$(location).attr('href','login.php');
		});
	});
	$('#_dPersonales').submit(function(event) {
		event.preventDefault();
		var tmp = new Array();
		tmp[0]	= json.id;
		$.each($("#_dPersonales *:not(label,div,option,span,form, input[type=submit],input[type=button])"), function(index, tag) {
			if($(tag).attr('id')  != "correo"){
				console.log($(tag).attr('id'));
				$(tag).val($(tag).val().toUpperCase());
			}
			tmp[index+1] = $(tag).val();
			//alert((index+1)+"  "+$(tag).val());
		});
		
		/*$.each(tmp, function(index, tag) {
			alert(index+"  "+tag);
		});*/
		var jsonString = JSON.stringify(tmp);
		$.post('includes/procesos.php', {op:"saveDP",data:jsonString},function(res){console.log(res)});
		mensaje("DATOS GUARDADOS","bien");
	});
	$('input:not(#titulo, #tDirR, #segNom)').keypress(function(event){ // Espacios
		if (event.which == 32) {
			event.preventDefault();
		}	
	});

	$('input[name=number]').keypress(function(event) {
		var caracter = String.fromCharCode(event.which);
		var numero = 0;
		for(var i=0 ; i<10 ; i++){
			(caracter==i)?i=10:numero++;
		}
		if(numero == 10){
			event.preventDefault();
		}
	});
	//$('input[name=texto]')

	$('input[name=texto]').keypress(function(event) {
		//alert(event.keyCode);
		if ((event.keyCode != 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122))
  			event.preventDefault();
		//$(this).val($(this).val().toUpperCase());
		});
	//});

	$('#btCpass').click(function(event) {
		var pass1 = $('#passA').val();
		var pass2 = $('#passN').val();
		var pass3 = $('#passC').val();
		
		if(pass2 == pass3){
			$.post("includes/procesos.php",{op:"cambiarPass",passA:pass1,passN:pass2},function(res){
				if(res == "true"){
					mensaje("CONTRASEÑA CAMBIADA","bien");
					$('#cPassD').dialog('close');
					$('input[type=password]').val("");
				}else{
					mensaje("Algo a fallado comprueba los datos","mal");
				}
			});
		}else{
			alert("Las contraseñas no coinciden");
		}
	});
	$('#btEB').click(function(event) {
		var sede = $('#sBachillerato').val();
		var instituto = $('#sBachillerato').val();
		var fe = $('#fEgreso').val();
		$.post('includes/procesos.php', {op:"saveEB",idSede:idSede,update:update,sede:sede,fecha:fe,id:json.id}, function(res) {
			$('#_eBasica').dialog('close');
			mensaje("Estudios guardados","bien");
		});
	});
	$('#btES').click(function(event) {
		var titulo = $('#sTitulo').val();
		var fecha = $('#fEgresoES').val();
		$.post('includes/procesos.php', {op:"saveES",titulo:titulo,fecha:fecha,id:json.id}, function(res) {
			$('#_eSuperior').dialog('close');
			mensaje("Estudios guardados","bien");
		});
	});
	$('#btOE').click(function(event) {
		var ms = confirm("Estas seguro de que los datos ingresados son correctos\nEstos datos no podran ser modificados\nVerifica tus datos antes de guardarlos");
		if(ms != true){
			return false;
		}
		var titulo = $('#titulo').val().toUpperCase();
		if(titulo == ""){
			alert("Hay campos sin llenar");
			return false;
		}
		var fechaI = $('#fIngreso').val();
		var fechaE = $('#fEgresoOE').val();
		var ins = $('#sInstituto').val();
		var sede =$('#sInstituto option:selected').text();
		$.post('includes/procesos.php', {op:"saveOE",ins:ins,titulo:titulo,fechaI:fechaI,fechaE:fechaE,id:json.id}, function(res) {
			var ids = jQuery('#list27').jqGrid('getDataIDs');
			ids = ids.length +1;
			jQuery("#list27").addRowData(ids,{
				sede:sede,
				titulo:titulo,
				fecha_ing:fechaI,
				fecha_egre:fechaE
			});
			$('#addOE').dialog('close');
			mensaje("Estudios guardados","bien");
		});
	});
	$('#btIL').click(function(event) {
		var ms = confirm("Estas seguro de que los datos ingresados son correctos\nEstos datos no podran ser modificados\nVerifica tus datos antes de guardarlos");
		if(ms != true){
			return false;
		}
		var fechaI = $('#fIngreso3').val();
		var fechaE = $('#fEgresoIL').val();
		var cargo = $('#cargos').val();
		var emp = $('#empresa').val();
		if (String($('#cargos').val()).length == 0 || String($('#empresa').val()).length == 0) {
			mensaje("Completa todos los campos","mal");
			return;
		};
		$.post('includes/procesos.php', {op:"saveIL",empresa:emp,cargo:cargo,fechaI:fechaI,fechaE:fechaE,id:json.id}, function(res) {
			var ids = $('#tLaboral').jqGrid('getDataIDs');
			ids = ids.length +1;
			jQuery("#tLaboral").addRowData(ids,{
				empresa:$('#empresa').val(),
				fecha_ing:fechaI,
				fecha_egre:fechaE,
				cargo:$('#cargos').val(),
				ciudad:$('#sMun3 option:selected').text()
			});
			$('#addIL').dialog('close');
			mensaje("Empleo guardado","bien");
		});
	});
	if(cambiar == "true"){
		//alert("Tu contraseña es insegura, debes cambiarla lo antes posible");
		$('#cPassD').dialog('open');
	}
}

function menuP(tag){
	var dID = $(tag).attr('id');
	switch(dID){
		case "eBasica":
			cambio = "eBasica";
			$.post("includes/procesos.php",{op:"eBasica",idPer:json.id},function(res){
				var data = JSON.parse(res);
				if(data.ciudad){
					update = true;
					idSede = data.id;
					//alert(data.departamento+"  "+data.ciudad+"  "+data.sede);
					$.post("includes/procesos.php",{op:"json",tabla:"paises"},function(res){llenarSelect("paisEB",res,json.id_pais)});
					$.post("includes/procesos.php",{op:"json",tabla:"departamentos",cW:"id_pais",idW:data.pais},function(res){llenarSelect("depEB",res,data.departamento)});
					$.post("includes/procesos.php",{op:"json",tabla:"ciudades",cW:"id_dpto",idW:data.departamento},function(res){llenarSelect("munEB",res,data.ciudad)});
					$.post("includes/procesos.php",{op:"json",tabla:"sedes",cW:"id_ciudad",idW:data.ciudad,ins:"2"},function(res){llenarSelect("sedeEB",res,data.sede)});				
					$('#fEgreso').val(data.fecha);
				}else{
					$('#sPais, #sDep, #sMun, #sBachillerato').html("");
					$.post("includes/procesos.php",{op:"json",tabla:"paises"},function(res){llenarSelect("paisEB",res,0)});				
					update = false;
				}
			});
			$('#_'+dID).dialog('open');
			break;
		case "eSuperior":
			$('#_'+dID).dialog('open');
			$.post("includes/procesos.php",{op:"eSuperior",idPer:json.id},function(res){
				var data = JSON.parse(res);
				titulo = data.id;
				$('#fEgresoES').val(data.fecha_egre);
				$.post("includes/procesos.php",{op:"json",tabla:"titulos"},function(res){llenarSelect("titulos",res,titulo)});
			});
			break;
		case "oEstudios":
			otrosE(json.id);
			$('#_'+dID).css('background-color', '#BC1717'); // Cambiar color Otros estudios
			$('.divWithTable').hide();
			$('#_'+dID).show('slide',{direction:"left"},400);
			break;
		case "dPersonales":
			$.post("includes/procesos.php",{op:"json",tabla:"paises"},function(res){llenarSelect("Pais",res,json.id_pais)});
			$.post("includes/procesos.php",{op:"json",tabla:"departamentos",cW:"id_pais",idW:json.id_pais},function(res){llenarSelect("Departamento",res,json.id_dep)});
			$.post("includes/procesos.php",{op:"json",tabla:"ciudades",cW:"id_dpto",idW:json.id_dep},function(res){llenarSelect("Municipio",res,json.id_ciu)});
			$('.divWithTable').hide();
			$('#_'+dID).show('slide',{direction:"right"},400);
			break;
		case "iLaboral":
			iLaboral(json.id);
			$('#_'+dID).css('background-color', '#BC1717'); // Cambiar color 
			$('.divWithTable').hide();
			$('#_'+dID).show('slide',{direction:"left"},400);
			break;
	}
}

function llenarSelect(a,res,id){
	try{
		var data = JSON.parse(res);
		var opt = new Array();
		for (var i = 0; i < data.tabla.length; i++) {
			opt[i] = $('<option/>',{
				'text':data.tabla[i].nombre,
				'value':data.tabla[i].id
			});
		}
		
		
	}catch(err){
		opt = "";
	}
	switch(a){
		case 'Pais':
			$('#sPaisR').html(opt);
			$("#sPaisR option[value="+id+"]").attr("selected",true);
			break;
		case 'Departamento':
			$('#sDepR').html(opt);
			$("#sDepR option[value="+id+"]").attr("selected",true);
			$.post("includes/procesos.php",{op:"json",tabla:"ciudades",cW:"id_dpto",idW:$('#sDepR').val()},function(res){llenarSelect("Municipio",res,0)});
			break;
		case 'Municipio':
			$('#sMunR').html(opt);
			$("#sMunR option[value="+id+"]").attr("selected",true);
			break;
		case 'paisEB':
			$('[name=sPais]').html(opt);
			$("[name=sPais] option[value="+id+"]").attr("selected",true);
			break;
		case 'depEB':
			$('[name=sDep]').html(opt);
			$("[name=sDep] option[value="+id+"]").attr("selected",true);
			//$('[name=sDep]').trigger("change");
			break;
		case 'munEB':
			$('[name=sMun]').html(opt);
			$("[name=sMun] option[value="+id+"]").attr("selected",true);
			//$('[name=sMun]').trigger("change");
			break;
		case 'sedeEB':
			$('[name=sBachillerato]').html(opt);
			$("[name=sBachillerato] option[value="+id+"]").attr("selected",true);
			break;
		case 'titulos':
			$('#sTitulo').html(opt);
			$("#sTitulo option[value="+id+"]").attr("selected",true);
			break;
		case 'empresa':
			var car = new Array();
			var tmp = $('#sMun3').val();
			$.post("includes/procesos.php",{op:"soloNombre",tabla:"sedesemps",cW:"id_lugar",idW:tmp},function(res){
				$.each(JSON.parse(res), function(index, val) {
					car[index] = val;
				});
				tem = JSON.parse(res);
				$('#empresa').autocomplete({
					source:car,
					change: verificarAutocomplete,
					minLength: 3 
				});
			});
			break;
	}
}

function limpiarCheckbox (){
	$('label[for^=cb]').attr({
		'style':'',
		'class':''
	});
	$('input[type=checkbox]').attr({
		'style':'',
		'class':''
	});
}
function verificarAutocomplete(){
	var tmp = $(this).val();
	var tmp2 = $(this).autocomplete('option','source');
	if (tmp2.indexOf(tmp) == -1) {
		alert("Selecciona un elemento de la lista");
		$(this).val("");
	};
}
function mensaje(str, color){	
	alert(str);
	/*$("#mensaje").html(str);
	if(color == "bien"){
		$("#mensaje").attr("class",color+" bienFondo");
	}else
		$("#mensaje").attr("class", color+" malFondo");
	$("#mensaje").show('pulsate',1500);
	setTimeout(function(){
		$("#mensaje").hide();
	},4000);*/
}