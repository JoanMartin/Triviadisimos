
	/********************************/
	 //main_layout
	/********************************/

	//HIDDEN OF REGISTER FORM
    $(document).click(function() {
	    $("#divBlack").click(function(){
	        $('#divRegister').css('visibility', 'hidden');
	        $('#divBlack').css('visibility', 'hidden');
    	});
    });

    //HIDDEN OF LOGIN FORM
    $(document).click(function() {
	    $("#divBlack").click(function(){
	        $('#divLogin').css('visibility', 'hidden');
	        $('#divBlack').css('visibility', 'hidden');
    	
   		});
    });

 	//VALIDATE PASSPORWD

    $(document).ready(function() {
        jQuery.validator.setDefaults({
          debug: true,
          success: "valid"
        });
        $( "#formRegister" ).validate({
          rules: {
            password: "required",
            password_confirmation: {
              equalTo: "#password"
            }
          },
			submitHandler: function(form) {
	                form.submit();
	            }
        });
	});
	/********************************/
	/********************************/
