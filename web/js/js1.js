
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
    /********************************/

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
        
    
    /***********************************/
     //Replace accent for upload  to DB
    /***********************************/        

    function replaceAccent(s) {
        s = str.replace("á", "#225");
        s = str.replace("é", "#233");
        s = str.replace("í", "#227");
        s = str.replace("ó", "#243");
        s = str.replace("ú", "#250");
    }