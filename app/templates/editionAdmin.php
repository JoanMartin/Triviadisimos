<?php ob_start() ?>

<!--BLACK SCREEN TO ADD QUESTION FORM-->
<div class="row" id="divBlack" >
</div>

<!--ADD QUESTION FORM-->
        <div class="container-addQuestion">
            <div class="row centered-form">
                <div class="col-md-10 col-lg-10 col-sm-offset-6 col-md-offset-4">
                    <div class="panel panel-default" id="divEdition" name="divEdition">
                        <div class="panel-heading">
                            <h3 class="panel-title">A&ntildeadir pregunta</h3>
                        </div>
                            <div class="panel-body">
                            <form role="form" id="formRegister" name="formRegister" method="post" action="addQuestion" >                            
                                
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="form-group">
                                                <select class="form-control" id="mundo" name="mundo"></select>
                                            </div>  
                                        </div>         
                                        <div class="col-sm-12 col-md-12">                          
                                            <div class="form-group">
                                                <select class="form-control" id="categoria" name="categoria"></select>
                                            </div>                                        
                                        </div>       
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="titulo" id="titulo" class="form-control input-sm" placeholder="T&#237tulo de la pregunta" required>
                                            </div>                                       
                                        </div>       
                                    </div>  

                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="respCorrecta" id="respCorrecta" class="form-control input-sm" placeholder="Respuesta Correcta" required>
                                            </div>                                      
                                        </div>  
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="resp1" id="resp1" class="form-control input-sm" placeholder="Respuesta Incorrecta" required>
                                            </div>
                                        </div>       
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="resp2" id="resp2" class="form-control input-sm" placeholder="Respuesta Incorrecta" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="resp3" id="resp3" class="form-control input-sm" placeholder="Respuesta Incorrecta" required>
                                            </div>
                                        </div>       
                                    </div>

                                <input type="submit" value="A&#241adir" class="btn btn-info btn-block button special">
                            
                            </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-10 col-lg-offset-10 ">
                <button id="top" type="button" onclick="addQuestionFunction()" class="btn btn-info">A&ntildeadir pregunta</button>
            </div>
        </div>    
        <br>  
        <div class="col-md-6 col-md-offset-3 col-lg-offset-3 ">
            <div class="panel boxPrincipalTitle">
                <div class="panel-heading">
                    <h3 class= "fontTitlePrincipal">Normal</h3>
                </div>  
            </div>    
        </div>   
        <br>            
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxBlueTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">Geograf&iacutea</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxBlueBody">
                        <?php 
                        if (is_array($params['listadoPreguntasGeografia']) || is_object($params['listadoPreguntasGeografia'])){
                            foreach ($params['listadoPreguntasGeografia'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                            <?php endforeach; 
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>      
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxGreenTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">Ciencias</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxGreenBody">
                        <?php 
                        if (is_array($params['listadoPreguntasCiencias']) || is_object($params['listadoPreguntasCiencias'])){
                            foreach ($params['listadoPreguntasCiencias'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                            <?php endforeach;
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>      
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxYellowTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">Historia</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxYellowBody">
                        <?php 
                        if (is_array($params['listadoPreguntasHistoria']) || is_object($params['listadoPreguntasHistoria'])){
                            foreach ($params['listadoPreguntasHistoria'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                            <?php endforeach;
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxRedTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">Arte y literatura</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxRedBody">
                        <?php 
                        if (is_array($params['listadoPreguntasArteyLiteratura']) || is_object($params['listadoPreguntasArteyLiteratura'])){
                            foreach ($params['listadoPreguntasArteyLiteratura'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                            <?php endforeach;
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxPinkTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">Espect&aacuteculos</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxPinkBody">
                        <?php 
                        if (is_array($params['listadoPreguntasEspectaculos']) || is_object($params['listadoPreguntasEspectaculos'])){
                            foreach ($params['listadoPreguntasEspectaculos'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                            <?php endforeach;
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxOrangeTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">Deportes</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxOrangeBody">
                        <?php 
                        if (is_array($params['listadoPreguntasDeportes']) || is_object($params['listadoPreguntasDeportes'])){
                            foreach ($params['listadoPreguntasDeportes'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                            <?php endforeach;
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <br>
        <br>
        <br>

        <div class="col-md-6 col-md-offset-3 col-lg-offset-3 ">
            <div class="panel boxPrincipalTitle">
                <div class="panel-heading">
                    <h3 class= "fontTitlePrincipal">Disney</h3>
                </div>  
            </div>    
        </div>   
        <br>           
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxBlueTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">Hab&iacutea una vez</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxBlueBody">
                        <?php 
                        if (is_array($params['listadoPreguntasHabiaUnaVez']) || is_object($params['listadoPreguntasHabiaUnaVez'])){
                            foreach ($params['listadoPreguntasHabiaUnaVez'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                             <?php endforeach; 
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>      
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxGreenTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">Maravilloso mundo de Disney</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxGreenBody">
                        <?php 
                        if (is_array($params['listadoPreguntasMarMundoDisney']) || is_object($params['listadoPreguntasMarMundoDisney'])){
                            foreach ($params['listadoPreguntasMarMundoDisney'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                            <?php endforeach; 
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>      
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxYellowTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">Monstruos y villanos</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxYellowBody">
                        <?php 
                        if (is_array($params['listadoPreguntasMonstruosYVillanos']) || is_object($params['listadoPreguntasMonstruosYVillanos'])){
                            foreach ($params['listadoPreguntasMonstruosYVillanos'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                            <?php endforeach; 
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxRedTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">Lugares y objetos</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxRedBody">
                        <?php 
                        if (is_array($params['listadoPreguntasLugaresYObjetos']) || is_object($params['listadoPreguntasLugaresYObjetos'])){
                            foreach ($params['listadoPreguntasLugaresYObjetos'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                            <?php endforeach; 
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxPinkTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">Estrellas secundarias</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxPinkBody">
                        <?php 
                        if (is_array($params['listadoPreguntasEstSecundarias']) || is_object($params['listadoPreguntasEstSecundarias'])){
                            foreach ($params['listadoPreguntasEstSecundarias'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                            <?php endforeach; 
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel boxOrangeTitle">
                    <div class="panel-heading">
                        <h3 class= "fontTitle">H&eacuteroes y heroinas</h3>
                        <span class="pull-right clickable"><i class="fa fa-minus"></i></span>
                    </div>
                    <div class="panel-body boxOrangeBody">
                        <?php 
                        if (is_array($params['listadoPreguntasHerYHer']) || is_object($params['listadoPreguntasHerYHer'])){
                            foreach ($params['listadoPreguntasHerYHer'] as $listadoPreguntas) :?>
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="question" >       
                                <input type="hidden" name="ID_Pregunta" id="ID_Pregunta" value=<?php echo $listadoPreguntas['ID_Pregunta'] ?>>                                
                                <a onclick="parentNode.submit()"><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></a>
                                <br>
                            </form>
                             <?php endforeach; 
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $contenido = ob_get_clean() ?>

<?php include 'user_layout.php' ?>