$(".makePayment").click(function(){
	fileUrl = ''+window.location.origin+'/graphApi/makePayment.php';
                $.getJSON(fileUrl, function(data){
                    alert(data.output);
				     if(data.output == 1){
				     	document.location = document.URL;
				     }else{
                        
				     }
				});
});