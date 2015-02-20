 $('.InsertProductData').on('click', '.testing', function() {
        
        test = $(this).serialize();
		alert(test);	
        event.preventDefault();
    });