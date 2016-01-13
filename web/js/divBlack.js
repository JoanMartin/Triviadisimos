
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
    
    //CHANGE USER PRIVILEGE FORM
    $(document).click(function() {
      $("#divBlack").click(function(){
          $('#divPrivilege').css('visibility', 'hidden');
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



  /********************************/
   //main_layout
  /********************************/

  //SHOW OF REGISTER FORM
    function RegisterFunction() {
        document.getElementById("divRegister").style.visibility="visible";
        document.getElementById("divBlack").style.visibility="visible";
        document.getElementById("divLogin").style.visibility="hidden";
    }
    //SHOW OF LOGIN FORM AND HIDDEN REGISTER(if necessary)
    function LoginFunction() {
        document.getElementById("divLogin").style.visibility="visible";
        document.getElementById("divBlack").style.visibility="visible";
        document.getElementById("divRegister").style.visibility="hidden";
    }

    /********************************/
     //perfil
    /********************************/

    var color = "#000";
        
    function editar() {
        //Read Only Off
        document.getElementById("nombre").readOnly = false;
        document.getElementById("apellidos").readOnly = false;
        document.getElementById("email").readOnly = false;
        //Color Border
        document.getElementById("nombre").style.borderColor= color; 
        document.getElementById("apellidos").style.borderColor= color; 
        document.getElementById("email").style.borderColor= color; 
        //Border Style
        document.getElementById("nombre").style.borderStyle = "dashed";   
        document.getElementById("apellidos").style.borderStyle = "dashed";   
        document.getElementById("email").style.borderStyle = "dashed";       
        //Border Width
        document.getElementById("nombre").style.borderWidth= "2px";
        document.getElementById("apellidos").style.borderWidth= "2px";
        document.getElementById("email").style.borderWidth= "2px";
    }

/********************************/
 //editionQuestion.php
/********************************/
    function cancelar() {
        location.href = "./edition";

    }

/********************************/
//editionAdmin.php
/********************************/

    //SHOW OF ADD QUESTION FORM
    function addQuestionFunction() {
        document.getElementById("divEdition").style.visibility="visible";
        document.getElementById("divBlack").style.visibility="visible";
    }

    //CHANGE USER PRIVILEGE FORM
    function changePrivilege() {
        document.getElementById("divPrivilege").style.visibility="visible";
        document.getElementById("divBlack").style.visibility="visible";
    }
