<?php require_once HEADER ?>

    <div class="container">
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
                               href="index.php?type=shirt&f=view_edit&id=<?php echo $row['id']; ?>">
                                <i class="fas fa-marker"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php require_once FOOTER ?>