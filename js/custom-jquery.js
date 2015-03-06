$(function() {
	    $( "#dob" ).datepicker({ 
	    	dateFormat: 'dd-mm-yy',
	    	changeMonth: true,
			changeYear: true,
			maxDate: new Date()
	     });
	    $( "#doe" ).datepicker({ 
	    	dateFormat: 'dd-mm-yy',
	    	changeMonth: true,
			changeYear: true,
			
	     });
  	});