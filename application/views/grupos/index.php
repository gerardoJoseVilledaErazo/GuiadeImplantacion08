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
            <h3>Listado de grupos</h3>
        </div>
        <div class="col-sm-6">
            <a class="btn btn-success d-block" href="<?= site_url('grupos/insertar') ?>">Agregar</a>
        </div>
        <br> 
        <div class="col-sm-6">
            <a class="btn btn-info d-block" href="<?=site_url('grupos/report_todos_los_grupos')?>">Reporte en PDF (Todos los grupos)</a>
        </div> 
        <br>
    </div>

    <div class="row mt-4">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Id Grupo</th>
                    <th>Numero de grupo</th>
                    <th>Año</th>
                    <th>Ciclo</th>
                    <th>Materia</th>
                    <th>Profesor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $item) : ?>
                    <tr>
                        <td><?php echo $item->idgrupo; ?></td>
                        <td><?php echo $item->num_grupo; ?></td>
                        <td><?php echo $item->anio; ?></td>
                        <td><?php echo $item->ciclo; ?></td>
                        <td><?php echo $item->materia; ?></td>
                        <td><?php echo $item->nombreCompleto; ?></td>
                        <td>
                            <a href="<?= site_url('grupos/modificar/' . $item->idgrupo) ?>">Modificar</a>
                            <a href="<?= site_url('grupos/eliminar/' . $item->idgrupo) ?>" 
                            onclick="return confirm('¿Está seguro?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>