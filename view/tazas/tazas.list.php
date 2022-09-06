<?php require_once HEADER?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Lista de Tazas</h1>
                <hr>
                <a href="view/tazas/tazas.new.php" class="btn btn-primary">Agregar Taza</a>
                <hr>
                <div class="col-sm-6">
                    <form action="index.php?type=tazas&function=searchByNombre" method="POST">
                        <input type="text" name="size" id="busqueda" placeholder="buscar por talla..."/>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
                    </form>
                </div>
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
                        <?php foreach($resTazas as $tazas): ?>
                        <tr>
                        <td><?php echo $tazas['id'] ?></td>
                        <td><?php echo $tazas['nombre'] ?></td>
                        <td><?php echo $tazas['tamaño'] ?></td>
                        <td><?php echo $tazas['descripcion'] ?></td>
                        <td><?php echo "$" . $tazas['valor'] ?></td>
                        <td><?php echo $tazas['cantidad'] ?></td>
                        <td>
                            <a href="tazas.edit.php?id=<?php echo $tazas['id'] ?>" class="btn btn-primary">
                                <i class="fas fa-marker"></i>
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once FOOTER?>
