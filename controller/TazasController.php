<?php
require_once 'model/dao/TazasDao.php';
require_once 'model/dto/TazasDto.php';
class TazasController
{
    private $model;
    private $tamaño = ['60 - 80ml', '100 – 220 ml', '240 -300 ml', '300 - 500 ml'];
    private $actualizar = '<a href="index.php?type=tazas" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Ver todos</a>';
    public function __construct()
    {
        $this->model = new TazasDao();
    }

    public function index()
    {
        $this->model=new TazasDao();
        $resTazas = $this->model->getAll();
        $tamaño = $this->tamaño;
        require_once VTAZAS.'list.php';
    }

    public function newTaza()
    {
        $tamaño = $this->tamaño;
        require_once VTAZAS . 'new.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tazas = new TazasDto();
            $tazas->setNombre(htmlentities($_POST['nombre']));
            $tazas->setTamano(htmlentities($_POST['tamano']));
            $tazas->setDescripcion(htmlentities($_POST['descripcion']));
            $tazas->setValor(htmlentities($_POST['valor']));
            $tazas->setCantidad(htmlentities($_POST['cantidad']));
            $fechaActual = new DateTime('NOW');
            $tazas->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
            $exito = $this->model->insert($tazas);
            $msj = 'Taza guardada exitosamente';
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
            header('Location:index.php?type=Tazas&f=index');
        }
    }

    public function searchByTamano()
    {
        $tamano = (!empty($_POST["tamano"])) ? htmlentities($_POST["tamano"]) : "";
        $tamaño = $this->tamaño;
        $resTazas = $this->model->getByTamano($tamano);
        $actualizar = $this->actualizar;
        require_once VTAZAS . 'list.php';
    }

    public function editTaza ()
    {

        $id = $_GET['id'];
        $tamaño = $this->tamaño;
        $resTazas = $this->model->getById($id);
        require_once VTAZAS.'edit.php';

    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tazas = new TazasDto();
            $tazas->setNombre(htmlentities($_POST['nombre']));
            $tazas->setTamano(htmlentities($_POST['tamano']));
            $tazas->setDescripcion(htmlentities($_POST['descripcion']));
            $tazas->setValor(htmlentities($_POST['valor']));
            $tazas->setCantidad(htmlentities($_POST['cantidad']));
            $fechaActual = new DateTime('NOW');
            $tazas->setFechaActualizacion($fechaActual->format('Y-m-d H:i:s'));
            $exito = $this->model->insert($tazas);
            $msj = 'Taza guardada exitosamente';
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
?>
