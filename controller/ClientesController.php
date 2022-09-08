<?php
// autor: Solórzano Zambrano Ricardo
require_once 'model/dao/ClientesDao.php';
require_once 'model/dto/ClientesDto.php';

class ClientesController
{
    private $model;

    public function __construct()
    {
        $this->model = new ClientesDao();
    }

    public function index()
    {
        $result = $this->model->getAll();
        require_once VCLIENTES . 'list.php';
    }

    public function searchByName()
    {
        $name = (!empty($_POST["nombre"])) ? htmlentities($_POST["nombre"]) : "";
        $result = $this->model->getByName($name);
        require_once VCLIENTES . 'list.php';
    }

    public function view_new()
    {

        $registros = ['2021', '2022'];
        $documentos = ['cedula', 'ruc'];
        require_once VCLIENTES . 'new.php';
    }


    public function create()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $clientes = new ClientesDto();
            $clientes->setId(htmlentities($_POST['id']));
            $clientes->setNombre(htmlentities($_POST['nombre']));
            $clientes->setApellido(htmlentities($_POST['apellido']));
            $clientes->setDocumento(htmlentities($_POST['documento']));
            $clientes->setRegistro(htmlentities($_POST['registro']));
            $exito = $this->model->insert($clientes);

            $msj = 'Cliente guardado exitosamente';
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
            header('Location:index.php?type=clientes&f=index');
        }
    }


    public function view_edit()
    {

        $id = $_REQUEST['id'];
        $registros = ['2021', '2022'];
        $documentos = ['cedula', 'ruc'];
        $clientes = $this->model->getById($id);

        require_once VCLIENTES . 'edit.php';

    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $clientes = new ClientesDto();
            $clientes->setId(htmlentities($_POST['id']));
            $clientes->setNombre(htmlentities($_POST['nombre']));
            $clientes->setApellido(htmlentities($_POST['apellido']));
            $clientes->setDocumento(htmlentities($_POST['documento']));
            $clientes->setRegistro(htmlentities($_POST['registro']));
            $exito = $this->model->update($clientes);

            $msj = 'Cliente actualizada exitosamente';
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
            header('Location:index.php?type=clientes&f=index');
        }
    }
}
