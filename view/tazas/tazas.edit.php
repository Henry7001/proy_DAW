<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar taza</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <meta author="Henry Miguel Ruiz Reyes">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Editar Taza</h1>
                <hr>
                <form action="tazas.edit.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $taza->id; ?>">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre de la Taza" value="<?php echo $taza->nombre; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tamano">Tamaño</label>
                        <input type="text" name="tamano" id="tamano" class="form-control" placeholder="Tamaño de la Taza" value="<?php echo $taza->tamano; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripción de la Taza" required><?php echo $taza->descripcion; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="number" name="valor" id="valor" class="form-control" placeholder="Valor de la Taza" value="<?php echo $taza->valor; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad de la Taza" value="<?php echo $taza->cantidad; ?>" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="tazas.list.php" class="btn btn-danger">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>