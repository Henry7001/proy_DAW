<?php
require_once 'model/dao/GorrasDao.php';
require_once 'model/dto/GorrasDto.php';
//gorra controller adaptado 
class GorrasController
{
    private $model;

    public function __construct()
    {
        $this->model = new GorrasDao();
    }

    public function index()
    {
        $result = $this->model->getAll();
        require_once VGORRA . 'list.php';
    }

    public function searchBySize()
    {
        $size = (!empty($_POST["size"])) ? htmlentities($_POST["size"]) : "";
        $result = $this->model->getBySize($size);
        require_once VGORRA . 'list.php';
    }

    public function view_new()
    {
//        implementacion pendiente para entrega final :D
        $tallas = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $disenos = ['Animado', 'Personalizado'];
        require_once VGORRA . 'new.php';
    }


    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gorras = new GorrasDto();
            $gorras->setId(htmlentities($_POST['id']));
            $gorras->setDiseno(htmlentities($_POST['diseno']));
            $gorras->setTalla(htmlentities($_POST['talla']));
            $gorras->setPrecio(htmlentities($_POST['precio']));
            $gorras->setCantidad(htmlentities($_POST['cantidad']));
            $exito = $this->model->insert($gorras);

            $msj = 'Gorra guardada exitosamente';
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
            header('Location:index.php?type=gorras&f=index');
        }
    }


    public function view_edit()
    {

        $id = $_REQUEST['id'];
        $tallas = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $disenos = ['Animado', 'Personalizado'];
        $gorras = $this->model->getById($id);

        require_once VGORRA . 'edit.php';

    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gorras = new GorrasDto();
            $gorras->setId(htmlentities($_POST['id']));
            $gorras->setDiseno(htmlentities($_POST['diseno']));
            $gorras->setTalla(htmlentities($_POST['talla']));
            $gorras->setPrecio(htmlentities($_POST['precio']));
            $gorras->setCantidad(htmlentities($_POST['cantidad']));
            $exito = $this->model->update($gorras);

            $msj = 'gorra actualizada exitosamente';
            $color = 'primary';
            if (!$exito) {
                $msj = "No se pudo realizar el actualizado";
                $color = "danger";
            }
            if (!isset($_SESSION)) {
                session_start();
            };
            $_SESSION['mensaje'] = $msj;
            $_SESSION['color'] = $color;
            //llamar a la vista
            header('Location:index.php?type=gorras&f=index');
        }
    }
}
