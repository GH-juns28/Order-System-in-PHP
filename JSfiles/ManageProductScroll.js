$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() == $(document).height()) {
    $("#LoadProduct").trigger('click');
   }
});

$("#LoadProduct").on('click',function(){
       page = $(".InsertProductData").attr('page');
       page = parseInt(page);
       console.log(page);
       $.get('http://a.localhost/graphApi/ManageProductsPagination.php?page='+page+'')
       .success(function(data) {
           $(".InsertProductData").append(data);
           jQuery(function(){
             //dom ready codes
          });
           page = page + 1;
            $(".InsertProductData").attr('page',page++);

       });
});