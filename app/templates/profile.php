<?php ob_start() ?>

<div class="container">
    <section class="top">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-1 col-md-4 col-md-offset-1 col-lg-4 text-center">
                <img src="web/images/icon user 1.png" class="profile-image" class="img-rounded img-responsive" />
                <br />
                <br />
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-1 col-lg-4 text-left">
                <h3 class="text-center">Datos de tu perfil</h3>
                <br />
                <label><strong>Nick</strong></label>
                <?php foreach ($params['profile'] as $profile) :?>
                
                <input type="text" class="form-control" value="<?php echo $profile['Nick'] ?>" readonly>
                <label><strong>Nombre</strong></label>
                <input type="text" class="form-control" value="<?php echo $profile['Nombre'] ?>" readonly>
                <label><strong>Apellidos</strong></label>
                <input type="text" class="form-control" value="<?php echo $profile['Apellidos']?>" readonly>
                <label><strong>Email</strong></label>
                <input type="text" class="form-control" placeholder="<?php echo $profile['Email'] ?>" readonly>
                <br>
                <a href="#" class="btn btn-success">Editar</a>
                <br /><br/>

                <?php endforeach; ?>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-1 col-lg-4 text-center">
                <h3>Cambia tu contrase&ntildea</h3>
                <br />
                <label>Introduce tu actual contrse&ntildea</label>
                <input type="password" class="form-control">
                <label>Introduce la nueva contrse&ntildea</label>
                <input type="password" class="form-control">
                <label>Vuelve a introducir la nueva contrse&ntildea</label>
                <input type="password" class="form-control" />
                <br>
                <a href="#" class="btn btn-warning">Change Password</a>
            </div>
        </div>
        <!-- ROW END -->


    </section>
    <!-- SECTION END -->
</div>


<?php $contenido = ob_get_clean() ?>

<?php include 'main_layout_userPrueba.php' ?>