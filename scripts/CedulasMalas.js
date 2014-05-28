function cedulasMalas () {
    $("#list27").jqGrid({
		url:'includes/CedulasMalas.php',
		datatype: "json",
		height: 240,
		width: 500,
		colNames:['Nombre','Cedula'],
		colModel:[
			{name:'nombre',index:'nombre', searchoptions:{sopt:['cn','nc']}},
			{name:'cedula',index:'cedula', searchoptions:{sopt:['cn','nc']}}
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
	$("#list27").jqGrid("filterToolbar",{searchOperators : false});

	$('#cedulasMalas').dialog('open');
}