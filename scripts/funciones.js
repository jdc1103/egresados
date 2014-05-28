$(document).ready(function(e) {
    $.ajax({
		url: './includes/process.php',
		type: 'post',
		data: {tag: 'getData'},
		dataType:'json',
		success: function(data){
			if(data.success){
				$.each(data, function(index,record){
					if($.isNumeric(index)){
						var row = $("<tr/>");
						$("<td/>").text(record.id).appendTo(row);
						$("<td/>").text(record.num_doc).appendTo(row);
						$("<td/>").text(record.ciudexp).appendTo(row);
						$("<td/>").text(record.pri_ape).appendTo(row);
						$("<td/>").text(record.seg_ape).appendTo(row);
						$("<td/>").text(record.pri_nom).appendTo(row);
						$("<td/>").text(record.seg_nom).appendTo(row);
						$("<td/>").text(record.genero).appendTo(row);
						$("<td/>").text(record.fecha_egre).appendTo(row);
						$("<td/>").text(record.programa).appendTo(row);
						$("<td/>").text(record.facultad).appendTo(row);
						$("<td/>").text(record.titulo).appendTo(row);
						$("<td/>").text(record.direccion).appendTo(row);
						$("<td/>").text(record.telefono).appendTo(row);
						$("<td/>").text(record.celular).appendTo(row);
						$("<td/>").text(record.correo).appendTo(row);
						$("<td/>").text(record.descripcion).appendTo(row);
						row.appendTo('table');
					}
				})
			}
			$('table').dataTable({
				"bjQueryUI": true,
				"sPaginationType": "full_numbers",
				"Sodoma" : "Rlfrtip"
			})
		}
	});
})