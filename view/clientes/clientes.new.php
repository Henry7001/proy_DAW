<!-- Solórzano Zambrano Ricardo -->
<?php
require_once HEADER ?>

    <div class="container">
        <div class="card card-body">
            <form action="index.php?type=clientes&function=create" method="POST" name="formClientesNew" id="formClientesNew">
                <div class="form-row">

                <div class="form-group col-sm-6">
                    <label>ID</label>
                    <input type="number" name="id">              
                </div>
                    <div class="form-group col-sm-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" name="apellido" id="apellido">
                    </div>

                <div class="form-group col-sm-6">
                    <label for="documento">Documento:</label>
                    <?php
                        foreach ($documentos as $documento)
                        echo "<div>
                            <input type='radio' name='documento' id='md-$documento' value='$documento'>
                            <label for='md-$documento' >$documento</label>
                            </div>
                            ";
                        ?>
                    </div>

                <div class="form-group col-sm-6">
                <label>Año de Registro:</label>
                <select name="registro" id="registro" class="form-control">
                    <?php
                    foreach ($registros  as $registro )
                        echo "<option value='$registro '>$registro </option>"
                    ?>
                </select>
                    <input type="submit" class="btn btn-succes" value="Agregar Cliente">
                </div>

                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>

                        <a href="index.php?type=clientes&function=index" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
            </form>


        </div>
    </div>


<?php require_once FOOTER ?>