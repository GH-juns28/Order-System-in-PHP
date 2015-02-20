$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() == $(document).height()) {
       page = $("#ProductContent").attr('page');
       page = parseInt(page);
       console.log(page);
       $.get('http://a.localhost/graphApi/NewOrderPagination.php?page='+page+'')
       .success(function(data) {
           $("#ProductContent").append(data);
           jQuery(function(){
             //dom ready codes
          });
           page = page + 1;
            $("#ProductContent").attr('page',page++);

       });



   }
});