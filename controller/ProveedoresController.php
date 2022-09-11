<?php
require_once 'model/dao/ProveedoresDao.php';
require_once 'model/dto/ProveedoresDto.php';
class ProveedoresController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProveedoresDao();
    }

    public function index()
    {
        $result = $this->model->getAll();
        require_once VPROVEEDORES . 'list.php';
    }

    public function searchByDesc()
    {
        $descripcion = (!empty($_POST["descripcion"])) ? htmlentities($_POST["descripcion"]) : "";
        $result = $this->model->getByDesc($descripcion);
        require_once VPROVEEDORES . 'list.php';
    }

    public function newProveedor()
    {
        require_once VPROVEEDORES . 'new.php';
    }


    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $proovedor = new ProveedoresDto();

            $proovedor->setDescripcion(htmlentities($_POST['descripcion']));
            $proovedor->setTiempoContrato(htmlentities($_POST['tiempoContrato']));
            $proovedor->setTipoContrato(htmlentities($_POST['tipoContrato']));
            $proovedor->setAnioInicioContrato(htmlentities($_POST['anioInicioContrato']));
            $proovedor->setAnioFinContrato(htmlentities($_POST['anioFinContrato']));
            $fechaActual = new DateTime('NOW');
            $proovedor->setFechaIngreso($fechaActual->format('Y-m-d H:i:s'));
            $exito = $this->model->insert($proovedor);
            $msj = 'Proveedor guardado exitosamente';
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
            header('Location:index.php?type=proveedores&f=index');
        }
    }
	
	public function eliminarProveedor(){
		$id = $_REQUEST['id'];
        $proveedor = $this->model->deletebyId($id);
		header('Location:index.php?type=proveedores&f=index');
	}


    public function editarProveedor()
    {

        $id = $_REQUEST['id'];
        $proveedor = $this->model->getById($id);

        require_once VPROVEEDORES . 'edit.php';

    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $proveedor = new ProveedoresDto();

            $proveedor->setId(htmlentities($_POST['id']));
            $proveedor->setDescripcion(htmlentities($_POST['descripcion']));
            $proveedor->setTiempoContrato(htmlentities($_POST['tiempoContrato']));
            $proveedor->setTipoContrato(htmlentities($_POST['tipoContrato']));
            $proveedor->setAnioInicioContrato(htmlentities($_POST['anioInicioContrato']));
            $proveedor->setAnioFinContrato(htmlentities($_POST['anioFinContrato']));
            $fechaActual = new DateTime('NOW');
            $proveedor->setFechaIngreso($fechaActual->format('Y-m-d H:i:s'));
            $exito = $this->model->update($proveedor);

            $msj = 'Proveedor actualizado exitosamente';
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
            header('Location:index.php?type=proveedores&f=index');
        }
    }
}
