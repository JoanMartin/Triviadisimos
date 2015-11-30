<?php ob_start() ?>

<!--ALERT-->
<div id="alert" class="alert alert-danger">
  <strong>UPS! Este Email ya est&aacute utilizado. Prueba otro!</strong> 
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'main_layout.php' ?>