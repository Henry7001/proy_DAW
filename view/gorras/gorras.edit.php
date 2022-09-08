<?php
require_once HEADER ?>
<!--autor: Jean Paolo Alvarez -->
    <div class="container">
        <div class="card card-body">
            <form action="index.php?type=gorras&function=edit" method="POST" name="formgorraEdit" id="formgorraEdit">
                <div class="form-row">
                    <input type="hidden" name="id" value="<?php echo $gorras['id']?>">

                    <div class="form-group col-sm-6">
                        <label for="talla">Talla</label>
                        <select id="talla" name="talla" class="form-control">
                            <?php foreach ($tallas as $talla) {
                                $select = $talla == $gorras['talla'] ? 'selected="selected"' : ""
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
                               placeholder="precio gorras" value="<?php echo $gorras['precio'] ?>"
                               required>
                    </div>


                    <div class="form-group col-sm-6">
                        <label for="cantidad">Cantidad</label>
                        <input id="cantidad" name="cantidad" class="form-control" type="number"
                               value="<?php echo $gorras['cantidad'] ?>" min="1" required>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="modelo">Diseño</label>
                        <div>
                            <?php
                            foreach ($disenos as $diseno) {
                                $cheched = $diseno == $gorras['diseño'] ? "checked" : ""
                                ?>

                                <input type='radio' name='diseno' id='<?php echo "md-" . $diseno ?>'
                                    <?php echo $cheched ?> value='<?php echo $diseno ?>'>
                                <label for='<?php echo "md-" . $diseno ?>'><?php echo $diseno ?></label>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Actualizar</button>

                        <a href="index.php?type=gorras&function=index" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
            </form>


        </div>
    </div>


<?php require_once FOOTER ?>