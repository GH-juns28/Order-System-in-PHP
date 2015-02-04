$( document ).ready(function() {
            $("#login").submit(function(){
                var $inputs = $('#login :input');
                console.log($inputs);
                event.preventDefault();
            });
        });