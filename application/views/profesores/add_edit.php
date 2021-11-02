<div class="container text-center">
    <?php if ($this->session->flashdata('success')) : ?>
        <p class="success"><strong><?php echo $this->session->flashdata('success'); ?></strong></p>
    <?php endif; ?>
    <?php if ($this->session->flashdata('error')) : ?>
        <p class="error"><strong><?php echo $this->session->flashdata('error'); ?></strong></p>
    <?php endif; ?>
</div>

<div class="container-fluid mt-2">
    <div class="ml-md-4 mr-md-4">
        <div class="title">
            <div class="col-12">
                <h3><?php echo isset($profesor) ? "Modificar" : "Agregar"; ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="ml-md-4 mr-md-4">
        <div class="row">
            <div class="offset-md-2 col-md-4 col-sm-12">
                <form action="<?= site_url("profesores"); ?>/<?= isset($profesor) ? "update" : 'add'; ?>" 
                    method="POST" class="form-ajax">

                    <div class="form">
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="PK_profesor" value="<?= isset($profesor) ? $profesor->idprofesor : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Id Profesor:</label>
                            <input class="form-control" placeholder="Escriba 10 digitos" type="text" name="idprofesor" value="<?= isset($profesor) ? $profesor->idprofesor : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Nombre:</label>
                            <input class="form-control" type="text" name="nombre" value="<?= isset($profesor) ? $profesor->nombre : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Apellido:</label>
                            <input class="form-control" type="text" name="apellido" value="<?= isset($profesor) ? $profesor->apellido : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Email:</label>
                            <input class="form-control" type="email" name="email" value="<?= isset($profesor) ? $profesor->email : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Fecha de nacimiento:</label>
                            <input class="form-control" type="date" name="fecha_nacimiento" value="<?= isset($profesor) ? $profesor->fecha_nacimiento : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Genero:</label>
                            <input class="form-control" placeholder="m o f" type="text" name="genero" value="<?= isset($profesor) ? $profesor->genero : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Profesion:</label>
                            <input class="form-control" type="text" name="profesion" value="<?= isset($profesor) ? $profesor->profesion : ""; ?>">
                        </div>

                        
                        <br>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" value="Guardar"> 
                            <a class='btn btn-success' href="<?= site_url('profesores') ?>">Volver</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>