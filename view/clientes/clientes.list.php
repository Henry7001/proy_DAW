<!-- Solórzano Zambrano Ricardo -->
<?php require_once HEADER ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="index.php?type=clientes&function=searchByName" method="POST">
                    <input type="text" name="nombre" id="busqueda" placeholder="buscar por nombre..."/>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
                </form>
            </div>
            <div class="col-sm-6 d-flex flex-column align-items-end">
                <a href="index.php?type=clientes&function=view_new">
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        Nuevo
                    </button>

                </a>
            </div>
        </div>
        <div class="table-responsive mt-2">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Documento</th>
                <th>Registro</th>
                <th>Acciones</th>
                </thead>
                <tbody class="tabladatos">
                <?php
                foreach ($result as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['apellido'] ?></td>
                        <td><?php echo $row['documento'] ?></td>
                        <td><?php echo $row['registro'] ?></td>
                        <td>
                            <a class="btn btn-primary"
                               href="index.php?type=clientes&function=view_edit&id=<?php echo $row['id']; ?>">
                                <i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger"
                                 href="index.php?type=clientes&function=delete&id=<?php echo $row['id']; ?>">
                                  <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php require_once FOOTER ?>