    
    var stop = false;  
    var data_aux;
    var category;

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
                category = $('#cat' + id_tag).text(); 
                searchQuestion();                                 
            }
        }, 85);
    }


    function catDown(tag) {
        setTimeout(function(){
            $(tag).css({'transform': 'scale(1)'});
        }, 85);
    }




    function searchQuestion(){
        jQuery.post(
            "app/GameController.php", 
            {category: category,
            functionname: 'lookForQuestion'},
            function(data, textStatus) {
                var dataJson = JSON.parse(data);
                data_aux = dataJson;

                $('#question').html(dataJson[0].preg);
                $('#answer1').html(dataJson[0].resp);
                $('#answer2').html(dataJson[1].resp);
                $('#answer3').html(dataJson[2].resp);
                $('#answer4').html(dataJson[3].resp);

                $('#questionDiv').css({'visibility': 'visible'}); 

                $('#ans1').click(function (event) {
                    answerClicked('#ans1', dataJson, 0);
                });

                $('#ans2').click(function (event) {
                    answerClicked('#ans2', dataJson, 1);
                });

                $('#ans3').click(function (event) {
                    answerClicked('#ans3', dataJson, 2);
                });

                $('#ans4').click(function (event) {
                    answerClicked('#ans4', dataJson, 3);
                });
            });
    }


    function answerClicked(tag, dataJson, idJson) {
        $('#progressBar').stop();


        jQuery.post(
            "app/GameController.php", 
            {correct: dataJson[idJson].correcta,
            id_question: dataJson[0].id_question,
            category: category,
            functionname: 'insertIntervention'},
            function(data, textStatus) {
                if (dataJson[idJson].correcta == 1) {
                    $(tag).css({'background': 'green'});
                    $("#categories").load("app/templates/game_reloadCategories.php");

                    jQuery.post(
                        "app/GameController.php", 
                        {functionname: 'checkWon'},
                        function(data, textStatus) {
                            var won = data;
                            if (!won) {
                                $('#progressBar').css({'height': '0em'});
                                getNextQuestion(tag);
                            } else {
                                setTimeout(function(){
                                    $('#blackDiv').css({'visibility': 'visible'}); 
                                    $('#congratulationsImgLeft').css({'visibility': 'visible'}); 
                                    $('#congratulationsImgRight').css({'visibility': 'visible'}); 

                                    jQuery.post(
                                        "app/GameController.php", 
                                        {functionname: 'finishGame'});
                                }, 1000);
                            }
                        });
                } else {
                    lookForCorrectAnswer(dataJson);
                    $(tag).css({'background': 'red'}); 
                    invertTurn();
                }
            });

        unbindClickFunction();
    }


    function getNextQuestion(tag){
        setTimeout(function(){
            stop = false;

            $(tag).css({'background': 'white'});
            $('#questionDiv').css({'visibility': 'hidden'});
            $('#btnStop').css({'visibility': 'visible'});

            catUp(1);
            $('#btnStop').click(function (event) {
                $('#btnStop').unbind("click");
                $('#btnStop').css({'visibility': 'hidden'});
                stop = true; 

                $('#progressBar').animate({
                    height: "100%"
                }, {duration: 10000,     
                    complete: questionNotAnswered
                });
            });
        }, 1000);       
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


    function questionNotAnswered(){
        insertIntervention(0, data_aux[0].id_question);
        lookForCorrectAnswer(data_aux);
        invertTurn();
        unbindClickFunction();
    }


    $(document).ready(function() {
        catUp(1);  
        
        $('#btnStop').click(function (event) {
            $('#btnStop').unbind("click");
            $('#btnStop').css({'visibility': 'hidden'});
            stop = true;

            $('#progressBar').animate({
                height: "100%"
            }, {duration: 10000,     
                complete: questionNotAnswered
            });
        });
    });