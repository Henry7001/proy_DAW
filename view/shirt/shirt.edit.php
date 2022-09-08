<!--autor:Luis Vargas Peñafiel-->
<?php require_once HEADER ?>

    <div class="container">
        <div class="card card-body">
            <form action="index.php?type=shirt&function=edit" method="POST" name="formShirtEdit" id="formShirtEdit">
                <div class="form-row">
                    <input type="hidden" name="id" value="<?php echo $shirt['id']?>">
                    <div class="form-group col-sm-6">
                        <label for="talla">Talla</label>
                        <select id="talla" name="talla" class="form-control">
                            <?php foreach ($tallas as $talla) {
                                $select = $talla == $shirt['talla'] ? 'selected="selected"' : ""
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
                        <label for="tela">Tela</label>
                        <select id="tela" name="tela" class="form-control">
                            <?php foreach ($telas as $tela) {
                                $select = $tela == $shirt['tela'] ? 'selected="selected"' : ""
                                ?>
                                <option value="<?php echo $tela ?>" <?php echo $select ?>>
                                    <?php echo $tela ?>
                                </option>

                                <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="precio">Precio</label>
                        <input name="precio" id="precio" class="form-control" type="number" min="1"
                               placeholder="precio camisas" value="<?php echo $shirt['precio'] ?>"
                               required>
                    </div>


                    <div class="form-group col-sm-6">
                        <label for="cantidad">Cantidad</label>
                        <input id="cantidad" name="cantidad" class="form-control" type="number"
                               value="<?php echo $shirt['cantidad'] ?>" min="1" required>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="modelo">Modelo</label>
                        <div>
                            <?php
                            foreach ($modelos as $modelo) {
                                $cheched = $modelo == $shirt['modelo'] ? "checked" : ""
                                ?>

                                <input type='radio' name='modelo' id='<?php echo "md-" . $modelo ?>'
                                    <?php echo $cheched ?> value='<?php echo $modelo ?>'>
                                <label for='<?php echo "md-" . $modelo ?>'><?php echo $modelo ?></label>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Actualizar</button>

                        <a href="index.php?type=shirt&function=index" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
            </form>


        </div>
    </div>


<?php require_once FOOTER ?>