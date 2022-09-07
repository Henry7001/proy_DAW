<?php require_once HEADER;?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Editar tazas</h1>
                <form action="index.php?type=tazas&function=edit" method="POST" name="formtazassEdit" id="formtazassEdit">
                    <input type="hidden" name="id" value="<?php echo $tazas['id']?>">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la taza" value="<?php echo $tazas['nombre']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tamano">Tamaño</label>
                        <select class="form-control" name="tamano" id="tamano" required>
                            <option value="">Seleccione un tamaño</option>
                            <?php
                            foreach ($tamaño as $t) {
                                echo ($tazas['tamaño'] == $t) ? "<option value='$t' selected>$t</option>" : "<option value='$t'>$t</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Descripción de la tazas" required><?php echo $tazas['descripcion']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="number" class="form-control" name="valor" id="valor" placeholder="Valor de la tazas" value="<?php echo $tazas['valor']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad de tazass" value="<?php echo $tazas['cantidad']?>" required>
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