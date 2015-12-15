<?php ob_start() ?>

<div class="container">
    <section class="top">
        <div class="row">
            <form role="form" id="formImgProfile" name="formImgProfile" action="index.php?ctl=imgProfile" method="post"  enctype="multipart/form-data" >         
                <div class="col-xs-12 col-sm-6 col-sm-offset-1 col-md-4 col-md-offset-1 col-lg-1 text-center">
                    <img src="web/images/users/<?php echo $_SESSION['username'] ?>.jpg" class="profile-image" class="img-rounded img-responsive" />
                    <br />
                    <br />
                    <input type="file" class="btn btn-default" id="fileImgProfile" name="fileImgProfile" value="" required>   
                    <br />
                    <br />
                    <button class="btn btn-primary">Cambiar</button>
                    <p id="pAdvise">*Si no se te visualizan los cambios prueba de cargar la p&aacutegina de nuevo</p>    
                </div>                  
            </form>

            <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-2 col-lg-3 text-left">
                <h3 class="text-center">Datos de tu perfil</h3>
                <br />
                <?php foreach ($params['profile'] as $profile) :?>

                <form role="form" id="formEditProfile" name="formEditProfile" method="post" action="index.php?ctl=editProfile" >       
                    <label><strong>Nick</strong></label>                
                    <input type="text" class="form-control" id="nick" name="nick" value="<?php echo $profile['Nick'] ?>" readonly>
                    <label><strong>Nombre</strong></label>
                    <input type="text" class="form-control" id="nombre" name="nombre" class"input" value="<?php echo $profile['Nombre'] ?>"  readonly>
                    <label><strong>Apellidos</strong></label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" class"input" value="<?php echo $profile['Apellidos'] ?>" readonly>
                    <label><strong>Email</strong></label>
                    <input type="text" class="form-control" id="email" name="email" class"input" value="<?php echo $profile['Email'] ?>" readonly>
                    <br>
                    <a onclick="editar()" class="btn btn-success">Editar</a>
                    <button class="btn btn-success">Guardar</button>
                    <br /><br/>
                </form>
                    
                <?php endforeach; ?>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 col-md-offset-1 col-lg-3 text-center">
            <form role="form" id="changePasswordProfile" name="changePasswordProfile" method="post" action="index.php?ctl=changePasswordProfile" >     
            
                <h3>Cambia tu contrase&ntildea</h3>
                <br />
                <label>Introduce tu actual contrase&ntildea</label>
                <input type="password" id="passActual" name="passActual" class="form-control" class"input" required>
                <label>Introduce la nueva contrase&ntildea</label>
                <input type="password" id="passNuevo" name="passNuevo" class="form-control" class"input" required>                
                <label>Vuelve a introducir la nueva contrase&ntildea</label>
                <input type="password" id="passNuevoConf" name="passNuevoConf" class="form-control" class"input" required>
                <br>
                <button class="btn btn-warning">Cambiar Contrase&ntildea</button>
            </form>
            </div>
        </div>
    </section>
</div>

<?php $contenido = ob_get_clean() ?>

<?php include 'user_layout.php' ?>