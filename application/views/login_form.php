<html>
<?php
// Si está logueado redirecciona al usuario a la pantalla principal
// en nuestro caso la pantalla principal es la de Estudiantes 
if (isset($this->session->userdata['logged_in'])) {
    redirect("/estudiantes");
}
?>
<head> 
<title>Inicio de sesión</title> 
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login.css">
</head> 
<body>
    <?php if ($this->session->flashdata('message_logout')): ?>
        <div class="message">
            <?=$this->session->flashdata('message_logout')?>
        </div> 
        <br>
    <?php endif;?>
    <div id="main" class="container-fluid mt-2"> 
        <div id="login" class="ml-md-4 mr-md-4"> 
            <h2>Inicio de sesión</h2> 
            <hr/>
            <form action="<?=site_url('user_authentication/user_login_process')?>" 
                method="POST" class="form-ajax">
                <?php if ($this->session->flashdata('message_display')): ?>
                    <div style="text-align:center; color: darkgreen;">
                    <?=$this->session->flashdata('message_display')?>
                    </div> 
                    <br>
                <?php endif;?>
                <div class='error_msg'>
                    <?php if ($this->session->flashdata('message_error')): ?>
                        <div><?=$this->session->flashdata('message_error')?></div> 
                        <br>
                    <?php endif;?>
                    <?=validation_errors()?>
                </div>
                <label>Usuario :</label> 
                <input type="text" name="username" id="name" 
                    placeholder="username"/><br /><br />
                <label>Contraseña :</label> 
                <input type="password" name="password" id="password" 
                    placeholder="**********"/><br/><br />
                <input type="submit" value=" Iniciar sesión " name="submit"/><br />
                <a href="<?=site_url('/user_authentication/user_registration_show')?>">Registrarse</a>
            </form>
        </div>
    </div>
</body>
</html>