<?php require_once HEADER?>
    <!-- Formulario de editar datos existentes con la función update de TazasDao -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Editar Taza</h1>
                <form action="index.php?type=tazas&function=update" method="POST" name="formTazasEdit" id="formTazasEdit">
                    <input type="hidden" name="id" value="<?php echo $taza->getId()?>">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la taza" value="<?php echo $taza->getNombre()?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tamano">Tamaño</label>
                        <select class="form-control" name="tamano" id="tamano" required>
                            <option value="">Seleccione un tamaño</option>
                            <?php
                            foreach ($tamaño as $t) {
                                if ($taza->getTamano() == $t) {
                                    echo "<option value='$t' selected>$t</option>";
                                } else {
                                    echo "<option value='$t'>$t</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Descripción de la taza" required><?php echo $taza->getDescripcion()?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="number" class="form-control" name="valor" id="valor" placeholder="Valor de la taza" value="<?php echo $taza->getValor()?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad de tazas" value="<?php echo $taza->getCantidad()?>" required>
                    </div>
                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="index.php?type=tazas&function=index" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php require_once FOOTER?>