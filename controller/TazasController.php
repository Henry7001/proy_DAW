<?php
//crear Tazas Controller usando los archivos de la carpeta model/dao y model/dto ya hechos sin comentarios
class TazasController
{
    private $model;
    public function __construct()
    {
        $this->model = new TazasDao();
    }
    public function Index()
    {
        require_once 'view/header.php';
        require_once 'view/tazas/shirt.php';
        require_once 'view/footer.php';
    }
    public function Crud()
    {
        $taz = new TazasDto();
        if (isset($_REQUEST['id'])) {
            $taz = $this->model->Obtener($_REQUEST['id']);
        }
        require_once 'view/header.php';
        require_once 'view/tazas/shirt-edit.php';
        require_once 'view/footer.php';
    }
    public function Guardar()
    {
        $taz = new TazasDto();
        $taz->__SET('id', $_REQUEST['id']);
        $taz->__SET('nombre', $_REQUEST['nombre']);
        $taz->__SET('tamano', $_REQUEST['tamano']);
        $taz->__SET('descripcion', $_REQUEST['descripcion']);
        $taz->__SET('valor', $_REQUEST['valor']);
        $taz->__SET('cantidad', $_REQUEST['cantidad']);
        $this->model->Actualizar($taz);
        header('Location: index.php');
    }
    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        header('Location: index.php');
    }
}
?>
