$("div#tabledata").on( "submit", ".testing", function() {
  parameters = $(this).serialize();
  console.log(parameters)
  fileUrl = ''+window.location.origin+'/graphApi/adminconfirmProduct.php?'+parameters+'';
  
  $.getJSON(fileUrl, function(data){
                    if(data.code == 200){
                    	document.location = document.URL;
                    }
				});
  event.preventDefault();
});