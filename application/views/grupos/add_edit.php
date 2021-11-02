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
                <h3><?php echo isset($grupo) ? "Modificar" : "Agregar"; ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="ml-md-4 mr-md-4">
        <div class="row">
            <div class="offset-md-2 col-md-4 col-sm-12">
                <form action="<?= site_url("grupos"); ?>/<?= isset($grupo) ? "update" : 'add'; ?>" 
                    method="POST" class="form-ajax">

                    <div class="form">
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="PK_grupo" value="<?= isset($grupo) ? $grupo->idgrupo : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Id Grupo:</label>
                            <input class="form-control" placeholder="Escriba 10 digitos" type="text" name="idgrupo" value="<?= isset($grupo) ? $grupo->idgrupo : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Numero de grupo:</label>
                            <input class="form-control" placeholder="Escriba 3 digitos" type="text" name="num_grupo" value="<?= isset($grupo) ? $grupo->num_grupo : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Año:</label>
                            <input class="form-control" type="number" name="anio" value="<?= isset($grupo) ? $grupo->anio : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Ciclo:</label>
                            <input class="form-control" placeholder="Por ejemplo: 01, 02" type="text" name="ciclo" value="<?= isset($grupo) ? $grupo->ciclo : ""; ?>">
                        </div>

                        <div class="form-group">
                            <label>Materia:</label>
                            <select class="form-control" name="idmateria">
                                <?php foreach ($materias as $item) : ?>

                                    <option value="<?= $item->idmateria ?>" <?= isset($grupo) && $item->idmateria == $grupo->idmateria ? "selected='selected'" : ""; ?>>

                                        <?= $item->materia ?>

                                    </option>

                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Profesor:</label>
                            <select class="form-control" name="idprofesor">
                                <?php foreach ($profesores as $item) : ?>

                                    <option value="<?= $item->idprofesor ?>" <?= isset($grupo) && $item->idprofesor == $grupo->idprofesor ? "selected='selected'" : ""; ?>>

                                        <?= $item->apellido ?>

                                    </option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" value="Guardar"> 
                            <a class='btn btn-success' href="<?= site_url('grupos') ?>">Volver</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>