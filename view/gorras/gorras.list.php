<?php require_once HEADER ?>
<!--autor: Jean Paolo Alvarez -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="index.php?type=gorras&function=searchBySize" method="POST">
                    <input type="text" name="size" id="busqueda" placeholder="buscar por talla..."/>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>Buscar</button>
                </form>
            </div>
            <div class="col-sm-6 d-flex flex-column align-items-end">
                <a href="index.php?type=gorras&function=view_new">
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
                <th>Diseño</th>
                <th>Talla</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
                </thead>
                <tbody class="tabladatos">
                <?php
                foreach ($result as $fila) {
                    ?>
                    <tr>
                        <td><?php echo $fila['id'] ?></td>
                        <td><?php echo $fila['diseño'] ?></td>
                        <td><?php echo $fila['talla'] ?></td>
                        <td><?php echo $fila['precio'] ?></td>
                        <td><?php echo $fila['cantidad'] ?></td>
                        <td>
                            <a class="btn btn-primary"
                               href="index.php?type=gorras&function=view_edit&id=<?php echo $fila['id']; ?>">
                                <i class="fas fa-marker"></i></a>
                            <a class="btn btn-danger"
                                 href="index.php?type=gorras&function=deleteGorras&id=<?php echo $fila['id']; ?>">
                                  <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php require_once FOOTER ?>