// autor:Piguave Saltos Marlon
<?php
require_once 'model/dao/ShirtDao.php';
require_once 'model/dto/ShirtDto.php';

class ShirtController {
    private $model;

    public function __construct() {
        $this->model = new ShirtDao();
    }

    public function index() {
        $resultados = $this->model->getAll();
        require_once VSHIRT.'list.php';
    }

    public function searchBySize(){
        $size = (!empty($_POST["size"]))?htmlentities($_POST["size"]):"";
        $resultados = $this->model->getBySize($size);
        require_once VSHIRT.'list.php';
    }
    
    public function view_new(){
        //comunicarse con el modelo
        $modeloCat = new CategoriasDAO();
        $categorias = $modeloCat->selectAll();

        // comunicarse con la vista
        require_once VSHIRT.'nuevo.php';

    }

    // lee datos del formulario de nuevo producto y lo inserta en la bdd (llamando al modelo)
    public function new() {
        //cuando la solicitud es por post
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// insertar el producto
            // considerar verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
            $prod = new Producto();
            // lectura de parametros
            $prod->setCodigo(htmlentities($_POST['codigo']));
            $prod->setNombre(htmlentities($_POST['nombre']));
            $prod->setDescripcion(htmlentities($_POST['descripcion']));
            $prod->setPrecio(htmlentities($_POST['precio']));
            $prod->setIdCategoria(htmlentities($_POST['categoria']));
            $estado = (isset($_POST['estado'])) ? 1 : 0; // ejemplo de dato no obligatorio
            $prod->setEstado($estado);
            $prod->setUsuario('usuario'); //$_SESSION['usuario'];
            $fechaActual = new DateTime('NOW');
            $prod->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));

            //comunicar con el modelo
            $exito = $this->model->insert($prod);

            $msj = 'Producto guardado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el guardado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=Productos&f=index');
        }
    }

    public function delete(){
        //leeer parametros
        $prod = new Producto();
        $prod->setId(htmlentities($_REQUEST['id']));
        $prod->setUsuario('usuario'); //$_SESSION['usuario'];
        $fechaActual = new DateTime('NOW');
        $prod->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));

        //comunicando con el modelo
        $exito = $this->model->delete($prod);
        $msj = 'Producto eliminado exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo eliminar la actualizacion";
            $color = "danger";
        }
        if(!isset($_SESSION)){ session_start();};
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        //llamar a la vista
        header('Location:index.php?c=productos&f=index');
    }


    // muestra el formulario de editar producto
    public function view_edit(){
        //leer parametro
        $id= $_REQUEST['id']; // verificar, limpiar
        //comunicarse con el modelo de productos
        $prod = $this->model->selectOne($id);
        //comunicarse con el modelo de categorias
        $modeloCat = new CategoriasDAO();
        $categorias = $modeloCat->selectAll();

        // comunicarse con la vista
        require_once VSHIRT.'edit.php';

    }

    // lee datos del formulario de editar producto y lo actualiza en la bdd (modelo)
    public function edit(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {// actualizar
            // verificaciones
            //if(!isset($_POST['codigo'])){ header('');}
            // leer parametros
            $prod = new Producto();
            $prod->setId(htmlentities($_POST['id']));
            $prod->setCodigo(htmlentities($_POST['codigo']));
            $prod->setNombre(htmlentities($_POST['nombre']));
            $prod->setDescripcion(htmlentities($_POST['descripcion']));
            $prod->setPrecio(htmlentities($_POST['precio']));
            $prod->setIdCategoria(htmlentities($_POST['categoria']));
            $estado = (isset($_POST['estado'])) ? 1 : 0; // un dato no requerido
            $prod->setEstado($estado);
            $prod->setUsuario('usuario'); //$_SESSION['usuario'];
            $fechaActual = new DateTime('NOW');
            $prod->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));

            //llamar al modelo
            $exito = $this->model->update($prod);
            $msj = 'Producto actualizado exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar la actualizacion";
                $color = "danger";
            }
            if(!isset($_SESSION)){ session_start();};
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?c=productos&f=index');

        }
    }
}
