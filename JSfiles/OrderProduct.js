$(".NewOrder").on( "submit", function( event ) {
    ProductVal = $(this).serialize();
    console.log(ProductVal);
    
    fileUrl = ''+window.location.origin+'/graphApi/NewOrder.php?'+ProductVal+'';
                $.getJSON(fileUrl, function(data){
                    console.log(data);
                    
                     
                });

  event.preventDefault();
});