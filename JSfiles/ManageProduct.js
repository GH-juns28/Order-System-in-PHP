 $('.InsertProductData').on('click', '.testing', function() {
        parameters = $(this).serialize();
		fileUrl = ''+window.location.origin+'/graphApi/DeleteProduct.php?'+parameters+'';
                $.getJSON(fileUrl, function(data){
                    console.log(data);
				     if(data.output == 1){
				     	document.location = document.URL;
				     }else{
                        
				     }
				});
		

        event.preventDefault();
    });