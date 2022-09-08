<!--autor:Paolo Alvararez-->
<?php
require_once HEADER ?>
    <div class="container">
        <div class="card card-body">
            <form action="index.php?type=gorra&function=create" method="POST" name="formgorraNew" id="formgorraNew">
                <div class="form-row">

                    <div class="form-group col-sm-6">
                        <label for="talla">Talla</label>
                        <select id="talla" name="talla" class="form-control">
                            <?php foreach ($tallas as $talla) {
                                ?>
                                <option value="<?php echo $talla ?>">
                                    <?php echo $talla ?>
                                </option>

                                <?php
                            }
                            ?>

                        </select>
                    </div>
                    
                    <div class="form-group col-sm-6">
                        <label for="precio">Precio</label>
                        <input name="precio" id="precio" class="form-control" type="number" min="1" placeholder="precio gorras"
                               required>
                    </div>



                    <div class="form-group col-sm-6">
                        <label for="cantidad">Cantidad</label>
                        <input id="cantidad" name="cantidad" class="form-control" type="number" min="1" required>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="modelo">Diseño</label>
                        <div>
                            <?php
                            foreach ($diseños as $diseño) {
                                ?>

                                <input type='radio' name='diseño' id='<?php echo "md-" . $diseño ?>'
                                       value='<?php echo $diseño ?>'>
                                <label for='<?php echo "md-" . $diseño ?>'><?php echo $diseño ?></label>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>

                        <a href="index.php?type=gorra&function=index" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
            </form>


        </div>
    </div>


<?php require_once FOOTER ?>