<?php
require_once 'model/dao/ShirtDao.php';
require_once 'model/dto/ShirtDto.php';
//autor:Luis Byron Vargas Peñafiel
class ShirtController
{
    private $model;

    public function __construct()
    {
        $this->model = new ShirtDao();
    }

    public function index()
    {
        $result = $this->model->getAll();
        require_once VSHIRT . 'list.php';
    }

    public function searchBySize()
    {
        $size = (!empty($_POST["size"])) ? htmlentities($_POST["size"]) : "";
        $result = $this->model->getBySize($size);
        require_once VSHIRT . 'list.php';
    }

    public function view_new()
    {
//        implementacion pendiente para entrega final :D
        $tallas = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $modelos = ['Modelo-1', 'Modelo-2'];
        $telas = ['Algodon', 'Poliester', 'Franela'];
        require_once VSHIRT . 'new.php';
    }


    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $shirt = new ShirtDto();

            $shirt->setModelo(htmlentities($_POST['modelo']));
            $shirt->setPrecio(htmlentities($_POST['precio']));
            $shirt->setCantidad(htmlentities($_POST['cantidad']));
            $shirt->setTalla(htmlentities($_POST['talla']));
            $shirt->setTela(htmlentities($_POST['tela']));
            $fechaActual = new DateTime('NOW');
            $shirt->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
            $exito = $this->model->insert($shirt);

            $msj = 'Camisa guardado exitosamente';
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
            header('Location:index.php?type=Shirt&f=index');
        }
    }

    public function deleteShirt()
    {
        $id = htmlentities($_GET['id']);
        $exito = $this->model->delete($id);
        $msj = 'Camisa eliminada exitosamente';
        $color = 'primary';
        if (!$exito) {
            $msj = "No se pudo realizar la eliminacion";
            $color = "danger";
        }
        if (!isset($_SESSION)) {
            session_start();
        };
        $_SESSION['mensaje'] = $msj;
        $_SESSION['color'] = $color;
        //llamar a la vista
        header('Location:index.php?type=Shirt&f=index');
    }


    public function view_edit()
    {

        $id = $_REQUEST['id'];
        $tallas = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $modelos = ['Modelo-1', 'Modelo-2'];
        $telas = ['Algodon', 'Poliester', 'Franela'];
        $shirt = $this->model->getById($id);

        require_once VSHIRT . 'edit.php';

    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $shirt = new ShirtDto();

            $shirt->setId(htmlentities($_POST['id']));
            $shirt->setModelo(htmlentities($_POST['modelo']));
            $shirt->setPrecio(htmlentities($_POST['precio']));
            $shirt->setCantidad(htmlentities($_POST['cantidad']));
            $shirt->setTalla(htmlentities($_POST['talla']));
            $shirt->setTela(htmlentities($_POST['tela']));
            $fechaActual = new DateTime('NOW');
            $shirt->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
            $exito = $this->model->update($shirt);

            $msj = 'Camisa actualizada exitosamente';
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
            header('Location:index.php?type=Shirt&f=index');
        }
    }
}
