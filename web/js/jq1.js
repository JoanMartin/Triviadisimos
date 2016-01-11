
	/********************************/
	 //main_layout
	/********************************/

$(document).ready(function () {
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

    $(document).ready(function() {
        jQuery.validator.setDefaults({
          debug: true,
          success: "valid"
        });
        $( "#changePasswordProfile" ).validate({
          rules: {
            passActual: "required",
            passNuevoConf: {
              equalTo: "#passNuevo"
            }
          },
      submitHandler: function(form) {
                  form.submit();
              }
        });
  });


/********************************/
 //editionAdmin
/********************************/
    
    //SHOW OF ADD QUESTION FORM
    $(document).click(function() {
      $("#divBlack").click(function(){
          $('#divEdition').css('visibility', 'hidden');
          $('#divBlack').css('visibility', 'hidden');
      
      });
    });


/***********************************/
//Toogle View List
/***********************************/        

  $(document).on('click', '.panel-heading span.clickable', function (e) {
      var $this = $(this);
      if (!$this.hasClass('panel-collapsed')) {
          $this.parents('.panel').find('.panel-body').slideUp();
          $this.addClass('panel-collapsed');
          $this.find('i').removeClass('fa-minus').addClass('fa-plus');
      } else {
          $this.parents('.panel').find('.panel-body').slideDown();
          $this.removeClass('panel-collapsed');
          $this.find('i').removeClass('fa-plus').addClass('fa-minus');
      }
  });
  $(document).on('click', '.panel div.clickable', function (e) {    
      var $this = $(this);
      if (!$this.hasClass('panel-collapsed')) {
          $this.parents('.panel').find('.panel-body').slideUp();
          $this.addClass('panel-collapsed');
          $this.find('i').removeClass('fa-minus').addClass('fa-plus');
      } else {
          $this.parents('.panel').find('.panel-body').slideDown();
          $this.removeClass('panel-collapsed');
          $this.find('i').removeClass('fa-plus').addClass('fa-minus');
      }
  });


  $('.panel-heading span.clickable').click();
  $('.panel div.clickable').click();

});
