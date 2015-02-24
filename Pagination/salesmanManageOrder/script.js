 var ajax_arry=[];
 var ajax_index =0;
 var sctp = 100;
 var url = 'Pagination/salesmanManageOrder/scroll.php';
 $(function(){
   $('#loading').show();
 $.ajax({
	     url:url,
                  type:"POST",
                  data:"actionfunction=showData&page=1",
        cache: false,
        success: function(response){
		   $('#loading').hide();
		  $('.InsertProductData').html(response);
		   
		}
		
	   });

	$(window).scroll(function(){
       
	   var height = $('.InsertProductData').height();
	   var scroll_top = $(this).scrollTop();
	   if(ajax_arry.length>0){
	   $('#loading').hide();
	   for(var i=0;i<ajax_arry.length;i++){
	     ajax_arry[i].abort();
	   }
	}
	   var page = $('.InsertProductData').find('.nextpage').val();
	   var isload = $('.InsertProductData').find('.isload').val();
	   
	     if ($(window).scrollTop() + $(window).height() == $(document).height() && isload=='true'){
		   $('#loading').show();
	   var ajaxreq = $.ajax({
	     url: url,
                  type:"POST",
                  data:"actionfunction=showData&page="+page,
        cache: false,
        success: function(response){
		   $('.InsertProductData').find('.nextpage').remove();
		   $('.InsertProductData').find('.isload').remove();
		   $('#loading').hide();
		   
		  $('.InsertProductData').append(response);
		 
		}
		
	   });
	   ajax_arry[ajax_index++]= ajaxreq;
	   
	   }
	return false;
	
 if($(window).scrollTop() == $(window).height()) {
       alert("bottom!");
   }
	});

});
	  