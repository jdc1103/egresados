function iLaboral (idw) {
    $("#tLaboral").jqGrid({
		url:'includes/laboral.php?idw='+idw,
		datatype: "json",
		height: 240,
		width: 955,
		colNames:['empresa','fecha_ing','fecha_retiro','cargo','ciudad'],
		colModel:[
			{name:'empresa',index:'empresa', searchoptions:{sopt:['cn','nc']}},
			{name:'fecha_ing',index:'fecha_ing', sorttype:'string',searchoptions:{sopt:['cn','eq','bw','bn','nc','ew','en']}},
			{name:'fecha_egre',index:'fecha_egre', sorttype:'string',searchoptions:{sopt:['cn','eq','bw','bn','nc','ew','en']}},
			{name:'cargo',index:'cargo', searchoptions:{sopt:['cn','nc']}},
			{name:'ciudad',index:'ciudad', searchoptions:{sopt:['cn','nc']}}
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
		pager: '#pagerLaboral',
		sortname: 'id',
		viewrecords: true,
		sortorder: "asc",
	});
	jQuery("#tLaboral").jqGrid('navGrid',"#pagerLaboral",{edit:false,add:false,search:false,del:false,refresh:false}); 
	if(!$('#btAddIL').lenght)
		jQuery("#tLaboral").jqGrid('navGrid',"#pagerLaboral").jqGrid('navButtonAdd',"#pagerLaboral",{ 
			id:"btAddIL", 
			caption:"Agregar empleo", 
			buttonicon:"none", 
			onClickButton:addILaboral, position: "last", 
			title:"Agregar empleo", cursor: "pointer"
		});
	//$("#tLaboral").jqGrid("filterToolbar",{searchOperators : true});
	
}
function addILaboral(){
	cambio = "laboral";
	$('select').html("");
	$('#addIL').dialog('open');
	$.post("includes/procesos.php",{op:"json",tabla:"paises"},function(res){llenarSelect("paisEB",res,0)});
}

/*jQuery("#tLaboral").addRowData({id:"6059", pri_nom:"jose",seg_nom:"jose", pri_ape:"jose",seg_ape:"jose",genero:"M",fecha_egre:"2007-10-01",titulo:"asldkj"})
jQuery('#tLaboral').jqGrid('getDataIDs');

INSERT INTO estudiospers (id_persona,fecha_egre,id_sede)
VALUES (6059,'2007-07-22',18060)

Komondor
*/