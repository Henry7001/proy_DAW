<!--autor:Dave Steven Delgado Galdea-->
<?php require_once HEADER?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Lista de Proveedores</h1>
                <hr>
                <a href="index.php?type=proveedores&function=newProveedor" class="btn btn-primary">Agregar Proveedor</a>
                <hr>
                <div class="col-sm-6">
                    <form action="index.php?type=proveedores&function=searchByDesc" method="POST">
                        <label for="tamano">Buscar por Descripcion</label><br>
                        <input class="form-control" name="descripcion" id="descripcion" placeholder="Ingresa la descripcion o nombre del proveedor.">
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
                            <th>Descripcion</th>
                            <th>Tiempo</th>
                            <th>Tipo</th>
                            <th>Inicio Contrato</th>
                            <th>Fin  Contrato</th>
                            <th>Fecha Ingreso</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($result as $proveedor): ?>
                        <tr>
                        <td><?php echo $proveedor['id'] ?></td>
                        <td><?php echo $proveedor['descripcion'] ?></td>
                        <td><?php echo $proveedor['tiempoContrato'] ?></td>
                        <td><?php echo $proveedor['tipoContrato'] ?></td>
                        <td><?php echo $proveedor['anioInicioContrato'] ?></td>
                        <td><?php echo $proveedor['anioFinContrato'] ?></td>
						<td><?php echo $proveedor['fechaIngreso'] ?></td>

                        <td>
                            <a href="index.php?type=proveedores&function=editarProveedor&id=<?php echo $proveedor['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
<<<<<<< Updated upstream
                        </td>
						<td>
                            <a href="index.php?type=proveedores&function=eliminarProveedor&id=<?php echo $proveedor['id'] ?>" class="btn btn-danger"><i class="fas fa-edit"></i> Eliminar</a>
=======
                            <a href="index.php?type=proveedores&function=eliminarProveedor&id=<?php echo $proveedor['id'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</a>
>>>>>>> Stashed changes
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once FOOTER?>
