$(".ManageOrderTable").submit(function(){
	parameters = $(this).serialize();
	fileUrl = ''+window.location.origin+'/graphApi/deleteOrder.php?'+parameters+'';
                $.getJSON(fileUrl, function(data){
                    console.log(data);
                    if(data.output == 1){
                    	document.location = document.URL;
                    	
                    }
				     
				});

	event.preventDefault();
});