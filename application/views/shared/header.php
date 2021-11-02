<?php
// Extraemos la información del usuario almacenada en la sesión
$usuario = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" 
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
      crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" 
      integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" 
      crossorigin="anonymous">
    </script>
    <title><?= $title ?></title>
    <script src="<?php echo base_url(); ?>js/jquery-3.4.1.min.js"></script> 
    <link rel="stylesheet" type="text/css" 
      href="<?php echo base_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" 
      href="<?php echo base_url(); ?>css/styles.css">
    <!-- SCRIPT NECESARIO PARA USAR AJAX EN LOS FORMULARIOS --> 
    <script src="<?php echo base_url(); ?>js/ajax.js"></script>
</head>
<body>
<script src="<?php echo base_url('js/bootstrap.bundle.min.js');?>"></script>
<script src="<?php echo base_url(); ?>js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>js/ajax.js"></script>
<div id="info_user" style="text-align: right" class="alert alert-success"> 
  <p><strong>Usuario:</strong> 
    <?=$usuario?> (<?=$email?>) | <a class="btn btn-outline-success my-2 my-sm-0"  href="<?=site_url('user_authentication/logout')?>">Cerrar sesión
                                  </a>
  </p>
</div>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <a class="navbar-brand" href="#">USO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" 
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('estudiantes') ?>">Estudiantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('carreras') ?>">Carreras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('materias') ?>">Materias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('profesores') ?>">Profesores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('grupos') ?>">Grupos</a>
        </li>
      </ul>
    </div>
  </nav>
</header>
    <h1> &emsp;  Guía de Implantación 08 - MAESTRO-DETALLE.</h1>
    &emsp;<strong>  Alumno: </strong> <p> &emsp;Gerardo José Villeda Erazo</p> <br>
    &emsp;<strong>  Código: </strong> <p> &emsp;VE16-I04-001</p> <br>
    &emsp;<strong>  Materia: </strong> <P> &emsp;Implantación de Sistemas</P>  <br>




