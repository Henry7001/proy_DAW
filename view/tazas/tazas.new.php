<?php require_once HEADER?>
<body>
    <!-- Formulario de insertar nuevos datos con la función insert de TazasDao -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Nueva Taza</h1>
                <form action="tazas.php" method="post">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de la taza" required>
                    </div>
                    <div class="form-group">
                        <label for="tamano">Tamaño</label>
                        <select class="form-control" name="tamano" id="tamano" required>
                            <option value="">Seleccione un tamaño</option>
                            <?php
                            // Se recorre el arreglo $tamaño para mostrar los valores en el select
                            foreach ($tamaño as $t) {
                                echo "<option value='$t'>$t</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Descripción de la taza" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="number" class="form-control" name="valor" id="valor" placeholder="Valor de la taza" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad de tazas" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="tazas.php" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
<?php require_once FOOTER?>
