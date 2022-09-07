<?php
require_once 'model/dao/gorraDao.php';
require_once 'model/dto/gorraDto.php';
//gorra controller adaptado 
class gorraController
{
    private $model;

    public function __construct()
    {
        $this->model = new gorraDao();
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
        $diseños = ['Animado', 'Personalizado'];
        require_once VGORRA . 'new.php';
    }


    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gorra = new gorraDto();

            $gorra->setDiseño(htmlentities($_POST['diseño']));
            $gorra->setPrecio(htmlentities($_POST['precio']));
            $gorra->setCantidad(htmlentities($_POST['cantidad']));
            $gorra->setTalla(htmlentities($_POST['talla']));
            $fechaActual = new DateTime('NOW');
            $gorra->setFechaActualizacion($fechaActual->format('Y-m-d'));
            $exito = $this->model->insert($gorra);

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
            header('Location:index.php?type=gorra&f=index');
        }
    }


    public function view_edit()
    {

        $id = $_REQUEST['id'];
        $tallas = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $diseños = ['Animado', 'Personalizado'];
        $gorra = $this->model->getById($id);

        require_once VGORRA . 'edit.php';

    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $gorra = new gorraDto();

            $gorra->setId(htmlentities($_POST['id']));
            $gorra->setDiseño(htmlentities($_POST['diseño']));
            $gorra->setTalla(htmlentities($_POST['talla']));
            $gorra->setPrecio(htmlentities($_POST['precio']));
            $gorra->setCantidad(htmlentities($_POST['cantidad']));
            $fechaActual = new DateTime('NOW');
            $gorra->setFechaActualizacion($fechaActual->format('Y-m-d'));
            $exito = $this->model->update($gorra);
            $msj = 'Gorra actualizada exitosamente';
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
            header('Location:index.php?type=gorra&f=index');
        }
    }
}
