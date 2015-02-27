$("#ProductContent").on('submit',".NewOrder",function(){

	parameters = $(this).serialize();
	console.log("parameters", parameters);
	fileUrl = ''+window.location.origin+'/graphApi/NewOrder.php?'+parameters+'';
                $.getJSON(fileUrl, function(data){
                    console.log(data);
                    if(data.output == 1){
                        $("p#alert16message").empty();
                        $("p#alert16message").append(data.message);
                        $("#myModal6").modal('show');
                        
                    }
                    if(data.output == 2){
                        $("p#alert16message").empty();
                        $("p#alert16message").append(data.message);
                        $("#myModal6").modal('show');
                    }
                     
                });
	event.preventDefault();
})