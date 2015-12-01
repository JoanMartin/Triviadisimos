<?php ob_start() ?>

<!--ALERT-->
<div id="alert" class="alert alert-danger">
  <strong><?php echo $text ?></strong> 
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'main_layout.php' ?>