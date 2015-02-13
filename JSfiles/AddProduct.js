$(".AddProduct").submit(function(){
	ProductVal = $(".AddProduct").serialize();
	console.log(ProductVal);
	fileUrl = ''+window.location.origin+'/graphApi/AddProducts.php?'+ProductVal+'';
                $.getJSON(fileUrl, function(data){
                	console.log(data);
                    if(data.output == 1){

                    }
				     $("#myModal6").modal('show');
				});

	event.preventDefault();
});

