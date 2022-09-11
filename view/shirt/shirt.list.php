<!--autor:Luis Vargas Peñafiel-->
<?php require_once HEADER ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="index.php?type=shirt&function=searchBySize" method="POST">
                    <input type="text" name="size" id="busqueda" placeholder="buscar por talla..."/>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
                </form>
            </div>
            <div class="col-sm-6 d-flex flex-column align-items-end">
                <a href="index.php?type=shirt&function=view_new">
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
                <th>Modelo</th>
                <th>Tela</th>
                <th>Talla</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
                </thead>
                <tbody class="tabladatos">
                <?php
                foreach ($result as $row) {
                    ?>
                    <tr>
                        <td><?php echo $row['modelo'] ?></td>
                        <td><?php echo $row['tela'] ?></td>
                        <td><?php echo $row['talla'] ?></td>
                        <td><?php echo $row['precio'] ?></td>
                        <td><?php echo $row['cantidad'] ?></td>
                        <td>
                            <a class="btn btn-primary"
                               href="index.php?type=shirt&function=view_edit&id=<?php echo $row['id']; ?>">
                                <i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger"
                                 href="index.php?type=shirt&function=deleteShirt&id=<?php echo $row['id']; ?>">
                                  <i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php require_once FOOTER ?>