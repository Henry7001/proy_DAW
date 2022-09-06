<?php
require_once 'model/dao/TazasDao.php';
class TazasController
{
    private $model;
    public function __construct()
    {
        $this->model = new TazasDao();
    }

    public function index()
    {
        $this->model=new TazasDao();
        $resTazas = $this->model->getAll();
        $tamaño = ['60 - 80ml', '100 – 220 ml', '240 -300 ml', '300 - 500 ml'];
        require_once VTAZAS.'list.php';
    }

    public function newTaza()
    {
        $tamaño = ['60 - 80ml', '100 – 220 ml', '240 -300 ml', '300 - 500 ml'];
        require_once VTAZAS . 'new.php';
    }

    public function searchByTamano()
    {
        $tamano = (!empty($_POST["tamano"])) ? htmlentities($_POST["tamano"]) : "";
        $result = $this->model->getByTamano($tamano);
        require_once VTAZAS . 'list.php';
    }

}
?>
