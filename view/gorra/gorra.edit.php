<!--autor:Paolo Alvararez-->
<?php
require_once HEADER ?>
    <div class="container">
        <div class="card card-body">
            <form action="index.php?type=gorra&function=edit" method="POST" name="formgorraEdit" id="formgorraEdit">
                <div class="form-row">
                    <input type="hidden" name="id" value="<?php echo $gorra['id']?>">
                    <div class="form-group col-sm-6">
                        <label for="talla">Talla</label>
                        <select id="talla" name="talla" class="form-control">
                            <?php foreach ($tallas as $talla) {
                                $select = $talla == $gorra['talla'] ? 'selected="selected"' : ""
                                ?>
                                <option value="<?php echo $talla ?>" <?php echo $select ?>">
                                <?php echo $talla ?>
                                </option>

                                <?php
                            }
                            ?>

                        </select>
                    </div>
        
                    <div class="form-group col-sm-6">
                        <label for="precio">Precio</label>
                        <input name="precio" id="precio" class="form-control" type="number" min="1"
                               placeholder="precio gorras" value="<?php echo $gorra['precio'] ?>"
                               required>
                    </div>


                    <div class="form-group col-sm-6">
                        <label for="cantidad">Cantidad</label>
                        <input id="cantidad" name="cantidad" class="form-control" type="number"
                               value="<?php echo $gorra['cantidad'] ?>" min="1" required>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="modelo">Diseño</label>
                        <div>
                            <?php
                            foreach ($diseños as $diseño) {
                                $cheched = $diseño == $gorra['diseño'] ? "checked" : ""
                                ?>

                                <input type='radio' name='diseño' id='<?php echo "md-" . $diseño ?>'
                                    <?php echo $cheched ?> value='<?php echo $diseño ?>'>
                                <label for='<?php echo "md-" . $diseño ?>'><?php echo $diseño ?></label>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Actualizar</button>

                        <a href="index.php?type=gorra&function=index" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
            </form>


        </div>
    </div>


<?php require_once FOOTER ?>