
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