function otrosE (idw) {
    $("#list27").jqGrid({
		url:'includes/OtrosEstudios.php?idw='+idw,
		editurl:'includes/OtrosEstudios.php',
		datatype: "json",
		height: 240,
		width: 955,
		colNames:['sede','titulo','fecha_ing','fecha_egre'],
		colModel:[
			{name:'sede',index:'sede', editable:true, searchoptions:{sopt:['cn','nc']}},
			{name:'titulo',index:'titulo', editable:true, searchoptions:{sopt:['cn','nc']}},
			{name:'fecha_ing',index:'fecha_ing', editable:true, sorttype:'string',searchoptions:{sopt:['cn','eq','bw','bn','nc','ew','en']}},
			{name:'fecha_egre',index:'fecha_egre', editable:true, sorttype:'string',searchoptions:{sopt:['cn','eq','bw','bn','nc','ew','en']}}
		],
		JsonReader: {repeatitems: false},
		rowNum:10,
		rowTotal: 2000,
		rowList : [10,20,30,50],
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
	if(!$('#btAdd').lenght)
		jQuery("#list27").jqGrid('navGrid',"#pager27").jqGrid('navButtonAdd',"#pager27",{ 
			id:"btAdd", 
			caption:"Agregar estudio", 
			buttonicon:"none", 
			onClickButton:addEstudio, position: "last", 
			title:"Agregar estudio", cursor: "pointer"
		});
	//$("#list27").jqGrid("filterToolbar",{searchOperators : false});
}
function addEstudio(){
	cambio = "otrosE";
	//$('select').html("");
	$('#addOE').dialog('open');
	$.post("includes/procesos.php",{op:"json",tabla:"paises"},function(res){llenarSelect("paisEB",res,0)});				
}

/*jQuery("#list27").addRowData({id:"6059", pri_nom:"jose",seg_nom:"jose", pri_ape:"jose",seg_ape:"jose",genero:"M",fecha_egre:"2007-10-01",titulo:"asldkj"})
jQuery('#list27').jqGrid('getDataIDs');

INSERT INTO estudiospers (id_persona,fecha_egre,id_sede)
VALUES (6059,'2007-07-22',18060)

{name:'genero',index:'genero', editable:true, stype:'select',editoptions:{value:":All;M:M;F:F"}},
Komondor
*/