    
    var stop = false;  
    var won;

    /*function cat1Up() {
        setTimeout(function(){
            if (stop == false) {
                $('#cat1').css({'transform': 'scale(1.1)'});
                catDown('#cat1');
                cat2Up();
            } else {
                $('#cat1').css({'transform': 'scale(1.1)'});   
                var category = $('#cat1').text();
                searchQuestion(category);      
            }
        }, 100);
    }


    function cat2Up() {
        setTimeout(function(){
            if (stop == false) {
                $('#cat2').css({'transform': 'scale(1.1)'});
                catDown('#cat2');
                cat3Up();
            } else {
                $('#cat2').css({'transform': 'scale(1.1)'});   
                var category = $('#cat2').text();
                searchQuestion(category);                                  
            }
        }, 100);
    }

    function cat3Up() {
        setTimeout(function(){
            if (stop == false) {
                $('#cat3').css({'transform': 'scale(1.1)'});
                catDown('#cat3');
                cat4Up();
            } else {
                $('#cat3').css({'transform': 'scale(1.1)'});   
                var category = $('#cat3').text();
                searchQuestion(category);                                  
            }
        }, 100);
    }


    function cat4Up() {
        setTimeout(function(){
            if (stop == false) {
                $('#cat4').css({'transform': 'scale(1.1)'});
                catDown('#cat4');
                cat5Up();
            } else {
                $('#cat4').css({'transform': 'scale(1.1)'});   
                var category = $('#cat4').text();
                searchQuestion(category);                                  
            }
        }, 100);
    }

    function cat5Up() {
        setTimeout(function(){
            if (stop == false) {
                $('#cat5').css({'transform': 'scale(1.1)'});
                catDown('#cat5');
                cat6Up();
            } else {
                $('#cat5').css({'transform': 'scale(1.1)'});   
                var category = $('#cat5').text(); 
                searchQuestion(category);                                 
            }
        }, 100);
    }


    function cat6Up() {
        setTimeout(function(){
            if (stop == false) {
                $('#cat6').css({'transform': 'scale(1.1)'});
                catDown('#cat6');
                cat1Up();
            } else {
                $('#cat6').css({'transform': 'scale(1.1)'});   
                var category = $('#cat6').text(); 
                searchQuestion(category);                                 
            }
        }, 100);
    }*/




    function catUp(id_tag) {
        setTimeout(function(){
            if (stop == false) {
                $('#cat' + id_tag).css({'transform': 'scale(1.1)'});
                catDown('#cat' + id_tag);
                if (id_tag == 6){
                    catUp(1); 
                } else {
                    var nextIdTag = id_tag + 1; 
                    catUp(nextIdTag);                    
                }
            } else {
                $('#cat' + id_tag).css({'transform': 'scale(1.1)'});   
                var category = $('#cat' + id_tag).text(); 
                searchQuestion(category);                                 
            }
        }, 100);
    }


    function catDown(tag) {
        setTimeout(function(){
            $(tag).css({'transform': 'scale(1)'});
        }, 100);
    }




    function searchQuestion(category){
        jQuery.post(
            "app/GameController.php", 
            {category: category,
            functionname: 'lookForQuestion'},
            function(data, textStatus) {
                var dataJson = JSON.parse(data);

                $('#question').html(dataJson[0].preg);
                $('#answer1').html(dataJson[0].resp);
                $('#answer2').html(dataJson[1].resp);
                $('#answer3').html(dataJson[2].resp);
                $('#answer4').html(dataJson[3].resp);

                $('#ans1').click(function (event) {
                    answerClicked('#ans1', dataJson, 0, category);
                });

                $('#ans2').click(function (event) {
                    answerClicked('#ans2', dataJson, 1, category);
                });

                $('#ans3').click(function (event) {
                    answerClicked('#ans3', dataJson, 2, category);
                });

                $('#ans4').click(function (event) {
                    answerClicked('#ans4', dataJson, 3, category);
                });
            });
    }


    function answerClicked(tag, dataJson, idJson, category) {
        insertIntervention(dataJson[idJson].correcta, dataJson[0].id_question, category);
        checkWon();
        if (dataJson[idJson].correcta == 1) {
            $(tag).css({'background': 'green'});

            setTimeout(function(){ 
                if (!won) {
                    getNextQuestion(tag);
                } else {
                    $('#question').css({'background': 'red'});

                    jQuery.post(
                        "app/GameController.php", 
                        {functionname: 'finishGame'});
                }
            }, 300);
        } else {
            lookForCorrectAnswer(dataJson);
            $(tag).css({'background': 'red'}); 
            //invertTurn();
        }
        unbindClickFunction();
    }


    function insertIntervention (correct, id_question, category) {
        jQuery.post(
            "app/GameController.php", 
            {correct: correct,
            id_question: id_question,
            category: category,
            functionname: 'insertIntervention'});

        setTimeout(function(){ 
            if (correct == 1) {
                $("#categories").load("app/game_reloadCategories.php");
            }
        }, 1000);
    }


    function checkWon () {
        var won;
        jQuery.post(
            "app/GameController.php", 
            {functionname: 'checkWon'},
            function(data, textStatus) {
                setWon(data);
            });
    }

    function setWon(data) {
        won = data;
    }


    function getNextQuestion(tag){
        setTimeout(function(){
            stop = false;
            $(tag).css({'background': 'white'});
            catUp(1);
            $('#btnStop').click(function (event) {
                stop = true;
            });
        }, 2000);        
    }


    function lookForCorrectAnswer (dataJson) {
        $.each(dataJson, function(i, item) {
            if (dataJson[i].correcta == 1) {
                $('#ans' + (i + 1)).css({'background': 'green'});                             
            }
        })
    }


    function invertTurn () {
        jQuery.post("app/GameController.php", 
            {functionname: 'invertTurn'});
    }


    function unbindClickFunction() {
        $('#ans1').unbind("click");
        $('#ans2').unbind("click");
        $('#ans3').unbind("click");
        $('#ans4').unbind("click");        
    }



    $(document).ready(function() {
        catUp(1);  
        
        $('#btnStop').click(function (event) {
            stop = true;
        });
    });