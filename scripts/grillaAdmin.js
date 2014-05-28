function grillaAdmin () {
    $("#list27").jqGrid({
		url:'includes/grillaAdmin.php',
		editurl:'includes/OtrosEstudios.php',
		datatype: "json",
		height: 240,
		width: 963,
		colNames:['pri_nom','seg_nom','pri_ape','seg_ape','num_doc','genero','instituto','programa','titulo','Otro titulo','idioma','experiencia','correo'],
		colModel:[
			{name:'pri_nom',index:'pri_nom', searchoptions:{sopt:['cn','nc']}},
			{name:'seg_nom',index:'seg_nom', searchoptions:{sopt:['cn','nc']}},
			{name:'pri_ape',index:'pri_ape', searchoptions:{sopt:['cn','nc']}},
			{name:'seg_ape',index:'seg_ape', searchoptions:{sopt:['cn','nc']}},
			{name:'num_doc',index:'num_doc', searchoptions:{sopt:['cn','nc']}},
			{name:'genero',index:'genero', stype:'select',editoptions:{value:":All;M:M;F:F"}},
			{name:'sede',index:'sede', searchoptions:{sopt:['cn','nc']}},
			{name:'programa',index:'programa', stype:'select',editoptions:{value:lPrograma}},
			{name:'titulo',index:'titulo', stype:'select',editoptions:{value:lTitulo}},
			{name:'otro_titulo',index:'otro_titulo', searchoptions:{sopt:['cn','nc']}},
			{name:'idioma',index:'idioma', stype:'select',editoptions:{value:lIdioma}},
			{name:'experiencia',index:'experiencia', sorttype:'string',searchoptions:{sopt:['cn','eq','bw','bn','nc','ew','en']}},
			{name:'correo',index:'correo', sorttype:'string',searchoptions:{sopt:['cn','eq','bw','bn','nc','ew','en']}}
		],
		JsonReader: {repeatitems: false},
		rowNum:100,
		rowTotal: 2000,
		rowList : [500,200,100,50,10],
		loadonce:true,
		mtype: "GET",
		rownumbers: true,
		rownumWidth: 40,
		gridview: true,
		pager: '#pager27',
		sortname: 'id',
		viewrecords: true,
		sortorder: "asc",
	});
	jQuery("#list27").jqGrid('navGrid',"#pager27",{edit:false,add:false,search:false,del:false,refresh:false}); 
	//if(!$('#btAdd').lenght)
	
	$("#list27").jqGrid("filterToolbar",{searchOperators : false});
	jQuery("#list27").jqGrid('navGrid',"#pager27").jqGrid('navButtonAdd',"#pager27",{ 
		id:"btEnviar", 
		caption:"Enviar correo", 
		buttonicon:"",
		onClickButton:enviarCorreo, position: "last", 
		title:"Enviar correo", cursor: "pointer"
	});
	jQuery("#list27").jqGrid('navGrid',"#pager27").jqGrid('navButtonAdd',"#pager27",{ 
		id:"btVer", 
		caption:"Ver correos", 
		buttonicon:"",
		onClickButton:VerCorreo, position: "last", 
		title:"Lista de correos", cursor: "pointer"
	});
	$("tr").on("keyup","td input",function(){
		if(event.keyCode != 37 && event.keyCode != 39){
			$(this).val($(this).val().toUpperCase()); 
		}
	}); 
}
function VerCorreo(){
	prepararCorreos();
	$('#ver').dialog('open');
	//otracolumna = myRow.nombredecoluma
}
function enviarCorreo(){
	prepararCorreos();
	$('#progress .bar').css(
        'width',
        '0%'
    );
    $('#fileupload').show();
	//otracolumna = myRow.nombredecoluma
    $('#correo').dialog('open');
}
function prepararCorreos(){
	var texto = new Array();
	var textoP = "";
	var myRow = new Array();
	var ids = $("#list27").jqGrid('getDataIDs');
	var tmp = new Array();
	for( var i = 0; i < ids.length; i++ ) {
		myRow = $("#list27").jqGrid('getRowData',ids[i]);
		var ban = false;
		for( var j = 0; j < tmp.length; j++ ) {
			if(myRow['correo'] == tmp[j] || myRow['correo'] == ""){
				ban = true;
			}
		}
		if (!ban) {
			tmp[i] = myRow['correo'];
		}
    }
	for( var i = 0; i < tmp.length; i++ ) {
		if(tmp.length-1 > i){
			if(tmp[i] != undefined){
				texto.push(tmp[i]);
				//texto += "'"+tmp[i]+"',";
				textoP += "<p>"+tmp[i]+",</p>";
			}
		}else{
			texto.push(tmp[i]);
			textoP += "<p>"+tmp[i]+"</p>";
		}
    } 
    //texto += "}";
    texto = JSON.stringify(texto);
    $('#lCorreo').html(textoP);   
    $('#taVer').html(texto); 
}

/*jQuery("#list27").addRowData({id:"6059", pri_nom:"jose",seg_nom:"jose", pri_ape:"jose",seg_ape:"jose",genero:"M",fecha_egre:"2007-10-01",titulo:"asldkj"})
jQuery('#list27').jqGrid('getDataIDs');

INSERT INTO estudiospers (id_persona,fecha_egre,id_sede)
VALUES (6059,'2007-07-22',18060)

{name:'genero',index:'genero', editable:true, stype:'select',editoptions:{value:":All;M:M;F:F"}},
Komondor

for( var i = 0; i < ids.length; i++ ) {
		myRow = $("#list27").jqGrid('getRowData',ids[i]);
		if (myRow['correo'] != "") {
			texto += "'"+myRow['correo']+"',"
			textoP += "<p>"+myRow['correo']+",</p>"
		}
    } 
*/