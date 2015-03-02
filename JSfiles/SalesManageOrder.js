$("div#tabledata").on( "submit", ".testing", function() {
  parameters = $(this).serialize();
  fileUrl = ''+window.location.origin+'/graphApi/salesmanConfirmProduct.php?'+parameters+'';
  console.log(fileUrl);
  $.getJSON(fileUrl, function(data){
                    if(data.code == 200){
                    	
                    	document.location = document.URL;
                    }
				});
  event.preventDefault();
});