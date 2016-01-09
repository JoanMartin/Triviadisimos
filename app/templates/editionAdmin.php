<?php ob_start() ?>


    <div class="container">
        <h3 class="text-center">Normal</h3>               
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
                            <form role="form" id="formEditQu" name="formEditQu" method="post" action="index.php?ctl=question" >       
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
                            <p><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></p>
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
                            <p><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></p>
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
                            <p><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></p>
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
                            <p><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></p>
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
                            <p><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></p>
                            <?php endforeach;
                        }else{?>
                        <p><?php echo "- No hay preguntas en esta categor&iacutea" ?></p><?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <h3 class="text-center">Disney</h3>               
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
                                 <p><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></p>
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
                                 <p><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></p>
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
                                 <p><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></p>
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
                                 <p><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></p>
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
                                 <p><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></p>
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
                                 <p><?php echo "- ".$listadoPreguntas['Text_Pregunta'] ?></p>
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