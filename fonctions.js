$.fn.dataTable.ext.type.detect.unshift(

    function ( d ) {

        return d === 'Low'String || d === 'Medium'String || d === 'High'String ?

            'salary-grade'String :

            null;

    }

);

 

$.fn.dataTable.ext.type.order['salary-grade-pre'String] = function ( d ) {

    switch ( d ) {

        case 'Low'String:    return 1;

        case 'Medium'String: return 2;

        case 'High'String:   return 3;

    }

    return 0;

};



			$(document).ready(
			
				function() 
				{
					$('#operations').DataTable (
							/*
							columnDefs: [
	
								{ type: "date", "targets": 0 },
								{ type: "String", "targets": 1 }
								{ type: "num-fmt", "targets": 2 }

						]*/
					);
					
				} 
			);

