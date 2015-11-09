<?php ob_start() ?>

    <div class ="top">
        <div class="container-login">
            <div class="row">  
            <table class="col-xs-12" class="col-lg-8" class="col-md-4" class="table">
                <thead>
                  <tr>
                    <th>
                        <div class="boxWhite">
                            <p>Partidas normales</p>
                            <div id="div-image-okay">
                                <table class="col-xs-4" class="table">
                                    <thead>
                                        <tr>
                                            <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                            <th><p><?php echo $paramsNormalAcertadas['numero_acertadas'] ?></p></th>      
                                        </tr>
                                    </thead>
                                </table>  
                            </div>
                            <div id="div-image-cross">
                                <table class="col-xs-4" class="table">
                                    <thead>
                                        <tr>
                                            <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                            <th><p><?php echo $paramsNormalFalladas['numero_falladas'] ?></p></th>      
                                        </tr>
                                    </thead>
                                </table>  
                            </div>                            
                            <p class ="percentage"><?php echo number_format($paramsNormalAcertadas['numero_acertadas']/($paramsNormalAcertadas['numero_acertadas'] + $paramsNormalFalladas['numero_falladas'])*100,0) ?> %</p>
                        </div>
                    </th>
                    <th>
                        <div class="boxWhite">
                            <p>Partidas disney</p>
                            <div id="div-image-okay">
                                <table class="col-xs-4" class="table">
                                    <thead>
                                        <tr>
                                            <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                            <th><p><?php echo $paramsDisneyAcertadas['numero_acertadas'] ?></p></th>      
                                        </tr>
                                    </thead>
                                </table>  
                            </div>
                            <div id="div-image-cross">
                                <table class="col-xs-4" class="table">
                                    <thead>
                                        <tr>
                                            <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                            <th><p><?php echo $paramsDisneyFalladas['numero_falladas'] ?></p></th>      
                                        </tr>
                                    </thead>
                                </table>  
                            </div>                            
                            <p class ="percentage"><?php echo number_format($paramsDisneyAcertadas['numero_acertadas']/($paramsDisneyAcertadas['numero_acertadas'] + $paramsDisneyFalladas['numero_falladas'])*100,0) ?> %</p>
                        </div>
                    </th>
                     <th>
                        <div class="boxWhite">
                            <p>Partidas totales</p>
                            <div id="div-image-okay">
                                <table class="col-xs-4" class="table">
                                    <thead>
                                        <tr>
                                            <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                            <th><p><?php echo $paramsTotalesAcertadas['numero_acertadas'] ?></p></th>      
                                        </tr>
                                    </thead>
                                </table>  
                            </div>
                            <div id="div-image-cross">
                                <table class="col-xs-4" class="table">
                                    <thead>
                                        <tr>
                                            <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                            <th><p><?php echo $paramsTotalesFalladas['numero_falladas'] ?></p></th>     
                                        </tr>
                                    </thead>
                                </table>  
                            </div>                            
                            <p class ="percentage"><?php echo number_format($paramsTotalesAcertadas['numero_acertadas']/($paramsTotalesAcertadas['numero_acertadas'] + $paramsTotalesFalladas['numero_falladas'])*100,0) ?> %</p>
                        </div>
                    </th>
                  </tr>
                </thead>
              </table>          
            </div>
        </div>
    </div>

    <!--PANELS CATEGORYS NORMAL -->
        <div class="container">
           <div class="row" style="padding-top:40px;">
                <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                             <h4>Geograf&iacutea</h4> 
                            </div>
                            <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalGeoAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalGeoFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2><strong><?php echo number_format($paramsNormalGeoAcertadas['numero_acertadas']/($paramsNormalGeoAcertadas['numero_acertadas'] + $paramsNormalGeoFalladas['numero_falladas'])*100,0) ?> %</strong></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                        <h4>Ciencias</h4> 
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><img  class="img-responsive" src="web/images/cross.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalCieAcertadas['numero_acertadas'] ?></p></strong></h2>
                                    
                                        <th><img  class="img-responsive" src="web/images/okay.png"></th>
                                        <th><h2><strong><?php echo $paramsNormalCieFalladas['numero_falladas'] ?></p></strong></h2> 
                                    </tr> 
                                </thead>
                            </table>   
                        </div>
                        <div class="panel-footer">
                            <h2><strong><?php echo number_format($paramsNormalCieAcertadas['numero_acertadas']/($paramsNormalCieAcertadas['numero_acertadas'] + $paramsNormalCieFalladas['numero_falladas'])*100,0) ?> %</strong></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                             <h4>INFO PANEL</h4> 
                            </div>
                            <div class="panel-body">
                                 <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                </p>
                              <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                </p>
                              
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-danger ">DANGER</a>
                            </div>
                        </div>
                    </div>
               <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                             <h4>PRIMARY PANEL</h4> 
                            </div>
                            <div class="panel-body">
                                 <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                </p>
                              <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                </p>
                              
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-primary ">PRIMARY</a>
                            </div>
                        </div>
                    </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                             <h4>SUCCESS PANEL</h4> 
                            </div>
                            <div class="panel-body">
                                 <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                </p>
                              <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                </p>
                              
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-success ">SUCCESS</a>
                            </div>
                        </div>
                    </div>
                <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                             <h4>INFO PANEL</h4> 
                            </div>
                            <div class="panel-body">
 <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                </p>
                              <p>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                </p>
                              
                            </div>
                            <div class="panel-footer">
                                <a href="#" class="btn btn-info ">INFO</a>
                            </div>
                        </div>
                    </div>
                
        </div>
        </div>

<?php $contenido = ob_get_clean() ?>

<?php include 'main_layout_userPrueba.php' ?>