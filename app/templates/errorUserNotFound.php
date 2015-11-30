<?php ob_start() ?>

<!--ALERT-->
<div id="alert" class="alert alert-danger">
  <strong>UPS! El usuario o la contrase&ntildea no coinciden. Prueba otra vez!</strong> 
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'main_layout.php' ?>