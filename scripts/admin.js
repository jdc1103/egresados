var lTitulo = ":All";
var lPrograma = ":All";
var lIdioma = ":All";
var archivo = "";
function inicio(){
	var respuesta;
	$('#fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
        	$('#fileupload').hide();
        	$.each(data.result.files, function (index, file) {
	        	//$('<p/>').text("Archivo Cargado").appendTo("#progress");
	        	archivo = file.name;
            });
        },
        progressall: function (e, data) {
	        var progress = parseInt(data.loaded / data.total * 100, 10);
	        $('#progress .bar').css(
	            'width',
	            progress + '%'
	        );
	    }
    });


	$.post("includes/procesos.php",{op:"selectAdmin"},function(res){
		respuesta = JSON.parse(res);
		//:":All;M:M;F:F"
		for (var i = 0 ; i <= respuesta["titulos"].length - 1; i++) {
			lTitulo += ";"+respuesta["titulos"][i]+":"+respuesta["titulos"][i];
		}
		for (var i = 0 ; i <= respuesta["programas"].length - 1; i++) {
			lPrograma += ";"+respuesta["programas"][i]+":"+respuesta["programas"][i];
		}
		for (var i = 0 ; i <= respuesta["idiomas"].length - 1; i++) {
			lIdioma += ";"+respuesta["idiomas"][i]+":"+respuesta["idiomas"][i];
		}
		//alert(lTitulo);
		grillaAdmin();
	});
	$('.divWithTable').show('slide');
	$('#ver').dialog({
		autoOpen: false, title:"Lista de correos"
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
	$('#correo').dialog({
		autoOpen: false, title:"Enviar correo",
		modal:true,
		width:400
	});
	$('#contenido').jqte();
	$('input[type=button]').button();
	$('#close').click(function(event) {
		$.post("includes/sqlite.php",{op:"close"},function(){
			$(location).attr('href', 'login.php');
		});
	});

	$('#btECorreo').click(function(event) {
		var asunto = $('#asunto').val();
		var textoC = $('#contenido').val();
		var listaC = $('#taVer').val();
		$.post("includes/mail.php",{asunto:asunto, correos:listaC, contenido:textoC, archivo:archivo},function(res){
			//alert(res);	
		});
		$('#correo').dialog('close');
		mensaje("Mensaje enviado","bien");
	});
	$('#cPass').click(function(event) {
		$('#cPassD').dialog('open');
	});
	$('#usuario input').focus(function(event) {
		$('#saveName').show();
	});
	$('#saveName').click(function(event) {
		var nUser = $('#usuario input').val();
		$.post("includes/sqlite.php",{op:"updateUser",nUser:nUser},function(res){
			alert("Has cambiado tu nombre de usuario");
		});
		$('#saveName').hide();
	});
	/*$("#usuario input").change(function(event) {
		var nUser = $(this).val();
		$.post("includes/sqlite.php",{op:"updateUser",nUser:nUser},function(res){
		});
	});*/
	$('#btCpass').click(function(event) {
		var pass1 = $('#passA').val();
		var pass2 = $('#passN').val();
		var pass3 = $('#passC').val();
		
		if(pass2 == pass3){
			$.post("includes/sqlite.php",{op:"cambiarPass",passA:pass1,passN:pass2},function(res){
				if(res == "true"){
					mensaje("CONTRASEÑA CAMBIADA","bien");
					$('#cPassD').dialog('close');
					$('input[type=password]').val("");
				}else{
					mensaje("Algo a fallado comprueba los datos","mal");
				}
			});
		}
	});
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
	
}