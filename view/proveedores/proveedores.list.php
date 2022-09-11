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
                        <td><?php echo $proveedor['Id'] ?></td>
                        <td><?php echo $proveedor['Descripcion'] ?></td>
                        <td><?php echo $proveedor['TiempoContrato'] ?></td>
                        <td><?php echo $proveedor['TipoContrato'] ?></td>
                        <td><?php echo $proveedor['AnioInicioContrato'] ?></td>
                        <td><?php echo $proveedor['AnioFinContrato'] ?></td>
						<td><?php echo $proveedor['fechaIngreso'] ?></td>
                        <td>
                            <a href="index.php?type=proveedores&function=editarProveedor&id=<?php echo $proveedor['Id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Editar</a>
                            <a href="index.php?type=proveedores&function=eliminarProveedor&id=<?php echo $proveedor['Id'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Eliminar</a>
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require_once FOOTER?>
