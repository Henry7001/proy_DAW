<!--autor: Jean Paolo Alvarez -->
<?php
require_once HEADER ?>
    <div class="container">
        <div class="card card-body">
            <form action="index.php?type=gorras&function=create" method="POST" name="formgorraNew" id="formgorraNew">
                <div class="form-row">
                <div class="form-group col-sm-6">
                    <label>ID</label>
                    <input type="number" name="id">              
                </div>

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
                            foreach ($disenos as $diseno) {
                                ?>

                                <input type='radio' name='diseño' id='<?php echo "md-" . $diseno ?>'
                                       value='<?php echo $diseno ?>'>
                                <label for='<?php echo "md-" . $diseño ?>'><?php echo $diseno ?></label>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>

                        <a href="index.php?type=gorras&function=index" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
            </form>


        </div>
    </div>


<?php require_once FOOTER ?>