
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

    function CreateGameFunction() {
        document.getElementById("divBlack").style.visibility="visible";
        document.getElementById("divCreateGame").style.visibility="visible";

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
        location.href = "./index.php?ctl=edition";

    }

/********************************/
//editionAdmin.php
/********************************/

    //SHOW OF ADD QUESTION FORM
    function addQuestionFunction() {
        document.getElementById("divEdition").style.visibility="visible";
        document.getElementById("divBlack").style.visibility="visible";
    }
