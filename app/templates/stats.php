<?php ob_start() ?>

    <!--PANELS NORMAL, DINEY AND TOTALES -->
        <div class="container">
            <div class="container-level stats">
                <div class="row">
                    <div class="column col-5">
                        <h3><?php echo $params['level']['nivel'] ?></h3>
                    </div>
                    <div class="column col-7 level-image">
                        <img class="img-responsive" src="web/images/levels/<?php echo $params['level']['img'] ?>">
                    </div>
                </div>
            </div>

            <div class="row" style="padding-top:3em;">
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel panel-default boxWhite">
                            <div class="panel-heading">
                             <h4 class= "fontTitlePrincipal">Preguntas normales</h4> 
                            </div>
                            <div class="panel-body boxWhiteBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsNormalAcertadas['numero_acertadas'] + $paramsNormalFalladas['numero_falladas'])){
                                    echo number_format($paramsNormalAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel panel-default boxWhite">
                        <div class="panel-heading">
                        <h4 class= "fontTitlePrincipal">Preguntas Disney</h4> 
                        </div>
                        <div class="panel-body boxWhiteBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsDisneyAcertadas['numero_acertadas'] + $paramsDisneyFalladas['numero_falladas'])){
                                    echo number_format($paramsDisneyAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel panel-default boxWhite">
                        <div class="panel-heading">
                         <h4 class= "fontTitlePrincipal">Preguntas totales</h4> 
                        </div>
                        <div class="panel-body boxWhiteBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsTotalesAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsTotalesFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsTotalesAcertadas['numero_acertadas'] + $paramsTotalesFalladas['numero_falladas'])){
                                    echo number_format($paramsTotalesAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>         
            </div>
        </div>

    <!--PANELS CATEGORYS NORMAL -->
        <div class="container">
           <div class="row" style="padding-top:10em;">
                <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel boxBlueTitle">
                            <div class="panel-heading">
                             <h4 class= "fontTitle">Geograf&iacutea</h4> 
                            </div>
                            <div class="panel-body boxBlueBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalGeoAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalGeoFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsNormalGeoAcertadas['numero_acertadas'] + $paramsNormalGeoFalladas['numero_falladas'])){
                                    echo number_format($paramsNormalGeoAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel boxGreenTitle">
                        <div class="panel-heading">
                        <h4 class= "fontTitle">Ciencias</h4> 
                        </div>
                        <div class="panel-body boxGreenBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalCieAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalCieFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsNormalCieAcertadas['numero_acertadas'] + $paramsNormalCieFalladas['numero_falladas'])){
                                    echo number_format($paramsNormalCieAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel boxYellowTitle">
                        <div class="panel-heading ">
                         <h4 class= "fontTitle">Historia</h4> 
                        </div>
                        <div class="panel-body boxYellowBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalHisAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalHisFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsNormalHisAcertadas['numero_acertadas'] + $paramsNormalHisFalladas['numero_falladas'])){
                                    echo number_format($paramsNormalHisAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
               <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel boxOrangeTitle">
                        <div class="panel-heading">
                         <h4 class= "fontTitle">Deportes</h4> 
                        </div>
                        <div class="panel-body boxOrangeBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalDepAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalDepFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsNormalDepAcertadas['numero_acertadas'] + $paramsNormalDepFalladas['numero_falladas'])){
                                    echo number_format($paramsNormalDepAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel boxPinkTitle">
                        <div class="panel-heading">
                         <h4 class= "fontTitle">Espect&aacuteculos</h4> 
                        </div>
                        <div class="panel-body boxPinkBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalEspAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalEspFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsNormalEspAcertadas['numero_acertadas'] + $paramsNormalEspFalladas['numero_falladas'])){
                                    echo number_format($paramsNormalEspAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel boxRedTitle">
                        <div class="panel-heading">
                         <h4 class= "fontTitle">Arte y literatura</h4> 
                        </div>                        
                        <div class="panel-body boxRedBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalAyLAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalAyLFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsNormalAyLAcertadas['numero_acertadas'] + $paramsNormalAyLFalladas['numero_falladas'])){
                                    echo number_format($paramsNormalAyLAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>                
            </div>
        </div>

    <!--PANELS CATEGORYS DINEY -->
        <div class="container">
           <div class="row" style="padding-top:10em;">
                <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel boxBlueTitle">
                            <div class="panel-heading">
                             <h4 class= "fontTitle">Hab&iacutea una vez</h4> 
                            </div>
                            <div class="panel-body boxBlueBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyHabLAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyHabFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsDisneyHabLAcertadas['numero_acertadas'] + $paramsDisneyHabFalladas['numero_falladas'])){
                                    echo number_format($paramsDisneyHabLAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel boxGreenTitle">
                        <div class="panel-heading">
                        <h4 class= "fontTitle">Maravilloso mundo de Disney</h4> 
                        </div>
                        <div class="panel-body boxGreenBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyMarAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyMarFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsDisneyMarAcertadas['numero_acertadas'] + $paramsDisneyMarFalladas['numero_falladas'])){
                                    echo number_format($paramsDisneyMarAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel boxYellowTitle">
                        <div class="panel-heading">
                         <h4 class= "fontTitle">Monstruos y villanos</h4> 
                        </div>
                        <div class="panel-body boxYellowBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyMonAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyMonFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsDisneyMonAcertadas['numero_acertadas'] + $paramsDisneyMonFalladas['numero_falladas'])){
                                    echo number_format($paramsDisneyMonAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
               <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel boxOrangeTitle">
                        <div class="panel-heading">
                         <h4 class= "fontTitle">H&eacuteroes y hero&iacutenas</h4> 
                        </div>
                        <div class="panel-body boxOrangeBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyHerAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyHerFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsDisneyHerAcertadas['numero_acertadas'] + $paramsDisneyHerFalladas['numero_falladas'])){
                                    echo number_format($paramsDisneyHerAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel boxPinkTitle">
                        <div class="panel-heading">
                         <h4 class= "fontTitle">Estrellas secundarias</h4> 
                        </div>
                        <div class="panel-body boxPinkBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyEstAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyEstFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsDisneyEstAcertadas['numero_acertadas'] + $paramsDisneyEstFalladas['numero_falladas'])){
                                    echo number_format($paramsDisneyEstAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel boxRedTitle">
                        <div class="panel-heading">
                         <h4 class= "fontTitle">Lugares y objetos</h4> 
                        </div>                        
                        <div class="panel-body boxRedBody">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyLugAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsDisneyLugFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2>
                            <strong>
                            <?php
                                if($total = ($paramsDisneyLugAcertadas['numero_acertadas'] + $paramsDisneyLugFalladas['numero_falladas'])){
                                    echo number_format($paramsDisneyLugAcertadas['numero_acertadas']/$total*100,0);
                            
                                }else{
                                    echo number_format($total);
                                }
                            ?>
                            %
                            </strong>
                            </h2>
                        </div>
                    </div>
                </div>                
            </div>
        </div>



<?php $contenido = ob_get_clean() ?>

<?php include 'user_layout.php' ?>
