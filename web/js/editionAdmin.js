
$(document).ready(function(){
    var inicio = ' ';
    $("#mundo").load('app/ModelDynamicSelects.php?inicio='+inicio);
});

$(document).ready(function(){
  	$("#mundo").change(function(event){
    	var mundo = $("#mundo").find(':selected').val().split(' ').join('+');
    	$("#categoria").load('app/ModelDynamicSelects.php?mundo='+mundo);
  	});
});