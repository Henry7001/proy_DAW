<!--autor:Henry Miguel Ruiz Reyes-->
<?php require_once HEADER?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Lista de Tazas</h1>
                <hr>
                <a href="index.php?type=tazas&function=newTaza" class="btn btn-primary">Agregar Taza</a>
                <hr>
                <div class="col-sm-6">
                    <form action="index.php?type=tazas&function=searchByTamano" method="POST">
                        <label for="tamano">Buscar por Tamaño</label><br>
                        <select name="tamano" id="tamano" required>
                            <option value="">Seleccione un tamaño...</option>
                            <?php
                            foreach ($tamaño as $t) {
                                echo "<option value='$t'>$t</option>";
                            }
                            ?>
                        </select>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                        <?php
                            if (isset($actualizar)) {
                                echo $actualizar;
                            }
                        ?>
                    </form>
                </div>
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
                        <?php foreach($resTazas as $tazas): ?>
                        <tr>
                        <td><?php echo $tazas['id'] ?></td>
                        <td><?php echo $tazas['nombre'] ?></td>
                        <td><?php echo $tazas['tamaño'] ?></td>
                        <td><?php echo $tazas['descripcion'] ?></td>
                        <td><?php echo "$" . $tazas['valor'] ?></td>
                        <td><?php echo $tazas['cantidad'] ?></td>
                        <td>
                            <a href="index.php?type=tazas&function=editTaza&id=<?php echo $tazas['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            <a href="index.php?type=tazas&function=deleteTaza&id=<?php echo $tazas['id'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once FOOTER?>
