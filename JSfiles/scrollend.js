$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() == $(document).height()) {
       page = $("#ProductContent").attr('page');
       page = parseInt(page);
       if(page > 1){
        fileUrl = ''+window.location.origin+'/graphApi/ProductPagination.php?page='+page+'';
                $.getJSON(fileUrl, function(data){
                    console.log(data);
            
        });
              }
        
       page = page + 1;
       $("#ProductContent").attr('page',page++);


   }
});