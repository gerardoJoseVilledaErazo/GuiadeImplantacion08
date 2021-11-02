<html>
<?php
// Validamos si el usuario está logueado
// Si está logueado entonces le redireccionamos
// a la pantalla principal, en nuestro caso
// es la pantalla de Estudiantes
if (isset($this->session->userdata['logged_in'])) { 
    redirect("/estudiantes");
}
?>
<head> 
<title>Registro</title> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login.css">
</head> 
<body>
    <div id="main" class="container-fluid mt-2" > 
        <div id="login" class="ml-md-4 mr-md-4"> 
            <h2>Registro</h2> 
            <hr/>
            <div class="error_msg">
                <?=validation_errors()?>
            </div> 
            <form action="<?=site_url('user_authentication/new_user_registration')?>" 
                method="POST" class="form-ajax" >
                <div class="error_msg">
                    <?php if (isset($message_display)): ?>
                        <?=$message_display;?>
                    <?php endif;?>
                </div> 
                <div class="form">
                    <div class="form-group">
                        <label>Usuario:</label><br> 
                        <input type="text" name="username" class="form-control" />
                    </div>
                    <br> 
                    <br> 
                    <div class="form-group">
                        <label>Email:</label><br> 
                        <input type="email" name="email_value" class="form-control" />
                    </div>
                    <br> 
                    <br> 
                    <div class="form-group">
                        <label>Contraseña:</label><br> 
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <br> 
                    <br> 
                    <div class="form-group">
                        <input type="submit" value="Registrarse" class="btn btn-success" />
                    </div>
                </div>
            </form> 
            <a href="<?php echo base_url() ?> ">Iniciar sesión</a>
        </div>
    </div>
</body>
</html>