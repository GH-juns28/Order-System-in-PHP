$(window).scroll(function() {
   if($(window).scrollTop() + $(window).height() == $(document).height()) {
    $("#LoadProduct").trigger('click');
   }
});

$("#LoadProduct").on('click',function(){
       page = $("#ProductContent").attr('page');
       page = parseInt(page);
       console.log(page);
       $.get('http://a.localhost/Pagination/')
       .success(function(data) {
           $("#ProductContent").append(data);
           jQuery(function(){
             //dom ready codes
          });
           page = page + 1;
            $("#ProductContent").attr('page',page++);

       });
});