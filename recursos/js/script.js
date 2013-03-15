$(function(){
	if($(".dataTable").length) {
	   	$(".dataTable").dataTable( {			
		"sPaginationType": "full_numbers",		
		"bInfo": false,	
		"bJQueryUI": true,		
		"oLanguage": {	"sLengthMenu": "_MENU_",		
			"sSearch": "",			
			"sInfo": "Mostrando _START_ de _END_ de _TOTAL_ registros",		
			"sZeroRecords": "No hay ningún registro",		
			"oPaginate": {					
				"sFirst":    "«",			
				"sPrevious": "←",				
				"sNext":     "→",				
				"sLast":     "»"				
				}		
			}	
		});
	}
});

