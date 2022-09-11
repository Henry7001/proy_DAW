<!-- Solórzano Zambrano Ricardo -->
<?php
require_once HEADER ?>

    <div class="container">
        <div class="card card-body">
            <form action="index.php?type=clientes&function=edit" method="POST" name="formClientesEdit" id="formClientesEdit">
                <div class="form-row">
                    <input type="hidden" name="id" value="<?php echo $clientes['id']?>">

                    <div class="form-group col-sm-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control"
                         value="<?php echo $clientes['nombre'] ?>"></div>
                    </div>    
                    
                    <div class="form-group col-sm-6">
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="apellido" class="form-control"
                         value="<?php echo $clientes['apellido'] ?>"></div>
                    </div>  

                    <div class="form-group col-sm-6">
                        <label for="mdocumento">Documento</label>
                        <div>
                            <?php
                            foreach ($documentos as $documento) {
                                $cheched = $documento == $clientes['documento'] ? "checked" : ""
                                ?>
                                <input type='radio' name='documento' id='<?php echo "md-" . $documento ?>'
                                    <?php echo $cheched ?> value='<?php echo $documento ?>'>
                                <label for='<?php echo "md-" . $documento ?>'><?php echo $documento ?></label>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="tela">Año de registro</label>
                        <select id="registro" name="registro" class="form-control">
                            <?php foreach ($registros as $registro) {
                                $select = $registro == $clientes['registro'] ? 'selected="selected"' : ""
                                ?>
                                <option value="<?php echo $registro ?>" <?php echo $select ?>>
                                    <?php echo $registro ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <br>      
                    <br>     
                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Actualizar</button>

                        <a href="index.php?type=clientes&function=index" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
            </form>


        </div>
    </div>


<?php require_once FOOTER ?>