<!--autor:Dave Steven Delgado Galdea-->
<?php require_once HEADER;?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Editar Proveedor</h1>
                <form action="index.php?type=proveedores&function=edit" method="POST" name="proveedorEdit" id="proveedorEdit">
                    <input type="hidden" name="id" value="<?php echo $proveedor['id']?>">
                    <div class="form-group">
                        <label for="nombre">Descripcion</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Nombre o descripcion del proveedor" value="<?php echo $proveedor['descripcion']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Tiempo de Contrato</label>
                        <input type="text" class="form-control" name="tiempoContrato" id="tiempoContrato" placeholder="Tiempo de contrato" value="<?php echo $proveedor['tiempoContrato']?>">
                    </div>
					<div class="form-group">
                        <label for="nombre">Tipo de Contrato</label>
                        <input type="text" class="form-control" name="tipoContrato" id="tipoContrato" placeholder="Tipo de contrato" value="<?php echo $proveedor['tipoContrato']?>">
                    </div>					
					<div class="form-group">
                        <label for="nombre">Anio de inicio de Contrato</label>
                        <input type="text" class="form-control" name="anioInicioContrato" id="anioInicioContrato" placeholder="Año de inicio del contrato" value="<?php echo $proveedor['anioInicioContrato']?>">
                    </div>
					<div class="form-group">
                        <label for="nombre">Anio de fin de Contrato</label>
                        <input type="text" class="form-control" name="anioFinContrato" id="anioFinContrato" placeholder="Año de fin del contrato" value="<?php echo $proveedor['anioFinContrato']?>">
                    </div>
					<br>
                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php?type=proveedores&function=index" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require_once FOOTER?>