$( document ).ready(function() {
			// Get login values on submit Form
            $("#login").submit(function(){
                LoginFormEmail = $("#login-form-email").val();
                LoginFormPassword = $("#login-form-password").val();
                
                // Get Value from API

                fileUrl = ''+window.location.origin+'/graphApi/loginApi.php?email='+LoginFormEmail+'&password='+LoginFormPassword+'';
                $.getJSON(fileUrl, function(data){
				     if(data.output == 1){
				     	document.location = ''+window.location.origin+'/index.php';
				     }else{
                        
				     }
				});
                event.preventDefault();
            });
        });