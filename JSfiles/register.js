$(".register").submit(function(){
	parameters = $(this).serialize();
	console.log(parameters);
	fileUrl = ''+window.location.origin+'/graphApi/register.php?'+parameters+'';
                $.getJSON(fileUrl, function(data){
                    console.log(data);
                    alert(data.message);
                    if(data.output == 0){

                    	document.location = 'index.php';
                    }
                     
                });

	event.preventDefault();
});