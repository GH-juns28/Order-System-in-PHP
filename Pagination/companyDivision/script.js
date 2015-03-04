 var ajax_arry=[];
 var ajax_index =0;
 var sctp = 100;
 var url = 'Pagination/companyDivision/scroll.php';
 $(function(){
   $('#loading').show();
   function getUrlParameter(sParam)
					{
					    var sPageURL = window.location.search.substring(1);
					    var sURLVariables = sPageURL.split('&');
					    for (var i = 0; i < sURLVariables.length; i++) 
					    {
					        var sParameterName = sURLVariables[i].split('=');
					        if (sParameterName[0] == sParam) 
					        {
					            return sParameterName[1];
					        }
					    }
					}    

					 parameter = parseInt(getUrlParameter('CompanyDivision'));

data = 'actionfunction=showData&page=1&Company_Division_Id='+parameter+'';
 $.ajax({
	     url:url,
                  type:"POST",
                  data:data,
        cache: false,
        success: function(response){
		   $('#loading').hide();
		  $('#ProductContent').html(response);
		   
		}
		
	   });

	$(window).scroll(function(){
       
	   var height = $('#ProductContent').height();
	   var scroll_top = $(this).scrollTop();
	   if(ajax_arry.length>0){
	   $('#loading').hide();
	   for(var i=0;i<ajax_arry.length;i++){
	     ajax_arry[i].abort();
	   }
	}
	   var page = $('#ProductContent').find('.nextpage').val();
	   var isload = $('#ProductContent').find('.isload').val();
	   
	     if ($(window).scrollTop() + $(window).height() == $(document).height() && isload=='true'){
		   $('#loading').show();
	   var ajaxreq = $.ajax({
	     url: url,
                  type:"POST",
                  data:"actionfunction=showData&Company_Division_Id="+parameter+"&page="+page,
        cache: false,
        success: function(response){
		   $('#ProductContent').find('.nextpage').remove();
		   $('#ProductContent').find('.isload').remove();
		   $('#loading').hide();
		   
		  $('#ProductContent').append(response);
		 
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
	  