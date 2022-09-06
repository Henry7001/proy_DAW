<?php
require_once HEADER ?>

    <div class="container">
        <div class="card card-body">
            <form action="index.php?type=shirt&function=create" method="POST" name="formShirtNew" id="formShirtNew">
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
                        <label for="tela">Tela</label>
                        <select id="tela" name="tela" class="form-control">
                            <?php foreach ($telas as $tela) {
                                ?>
                                <option value="<?php echo $tela ?>">
                                    <?php echo $tela ?>
                                </option>

                                <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="precio">Precio</label>
                        <input name="precio" id="precio" class="form-control" type="number" min="1" placeholder="precio camisas"
                               required>
                    </div>



                    <div class="form-group col-sm-6">
                        <label for="cantidad">Cantidad</label>
                        <input id="cantidad" name="cantidad" class="form-control" type="number" min="1" required>
                    </div>

                    <div class="form-group col-sm-12">
                        <label for="modelo">Modelo</label>
                        <div>
                            <?php
                            foreach ($modelos as $modelo) {
                                ?>

                                <input type='radio' name='modelo' id='<?php echo "md-" . $modelo ?>'
                                       value='<?php echo $modelo ?>'>
                                <label for='<?php echo "md-" . $modelo ?>'><?php echo $modelo ?></label>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>

                        <a href="index.php?type=shirt&function=index" class="btn btn-primary">
                            Cancelar</a>
                    </div>
                </div>
            </form>


        </div>
    </div>


<?php require_once FOOTER ?>