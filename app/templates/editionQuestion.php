<?php ob_start() ?>

<div class="container">
    <section class="top">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2 ">
                <h3 class="text-center">Edici&oacuten de la pregunta</h3>
                <br />

                <form role="form" id="formEditProfile" name="formEditProfile" method="post" action="index.php?ctl=editQuestion" >                       
                    <input type="text" class="form-control" id="Text_Pregunta" name="Text_Pregunta" value="<?php echo $result['Text_Pregunta'] ?>" > 
                    <input type="hidden" class="form-control" id="ID_Pregunta" name="ID_Pregunta" value="<?php echo $result['ID_Pregunta'] ?>" > 
                    <br>   
                    <?php                     
                    $x=1;
                    foreach ($params['listadoRespuestas'] as $listadoRespuestas) :?>
                        <input type="hidden" class="form-control" id="<?php 'ID_Respuesta'.$x?>"  name="<?php 'ID_Respuesta'.$x?>" value="<?php echo $listadoRespuestas['ID_Respuesta'] ?>" > 
                        <input type="text" class="form-control" id="<?php 'Text_Respuesta'.$x?>" name="<?php 'Text_Respuesta'.$x?>" value=<?php echo $listadoRespuestas['Texto_Respuesta'] ?>> 
                    <?php
                    $x= $x + 1;
                    endforeach; ?>
                    <button class="btn btn-success">Cancelar</button>
                    <button class="btn btn-success">Guardar</button>
                    <br /><br/>
                </form>                    
            </div>
        </div>
    </section>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'user_layout.php' ?>