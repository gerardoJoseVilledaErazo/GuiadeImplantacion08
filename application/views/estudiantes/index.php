<div class="container">
    <div class="mt-4">
        <?php if ($this->session->flashdata('success')) : ?>
            <p class="success"><strong><?php echo $this->session->flashdata('success'); ?></strong></p>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
            <p class="error"><strong><?php echo $this->session->flashdata('error'); ?></strong></p>
        <?php endif; ?>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h3>Listado de estudiantes</h3>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-success d-block" href="<?= site_url('estudiantes/insertar') ?>">Agregar</a>
        </div>
        <br> 
        <div class="col-sm-6">
            <a class="btn btn-info d-block" href="<?=site_url('estudiantes/report_todos_los_estudiantes')?>">Reporte en PDF (Todos los estudiantes)</a>
        </div> 
        <br>
    </div>

    <div class="row mt-4">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id Estudiante</th>
                    <th>Email</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $item) : ?>
                    <tr>
                        <td><?php echo $item->idestudiante; ?></td>
                        <td><?php echo $item->email; ?></td>
                        <td><?php echo $item->usuario; ?></td>
                        <td><?php echo $item->nombre; ?></td>
                        <td><?php echo $item->apellido; ?></td>
                        <td><?php echo $item->carrera; ?></td>
                        <td>
                            <a href="<?= site_url('estudiantes/modificar/' . $item->idestudiante) ?>">Modificar</a>
                            <a href="<?= site_url('estudiantes/eliminar/' . $item->idestudiante) ?>" 
                            onclick="return confirm('¿Está seguro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>