<?php HEADER?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Lista de Tazas</h1>
                <hr>
                <a href="tazas.new.php" class="btn btn-primary">Agregar Taza</a>
                <hr>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Tamaño</th>
                            <th>Descripción</th>
                            <th>Valor</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tazas as $taza): ?>
                        <tr>
                            <td><?php echo $taza->id; ?></td>
                            <td><?php echo $taza->nombre; ?></td>
                            <td><?php echo $taza->tamano; ?></td>
                            <td><?php echo $taza->descripcion; ?></td>
                            <td><?php echo $taza->valor; ?></td>
                            <td><?php echo $taza->cantidad; ?></td>
                            <td>
                                <a href="tazas.edit.php?id=<?php echo $taza->id; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="tazas.delete.php?id=<?php echo $taza->id; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php FOOTER?>
