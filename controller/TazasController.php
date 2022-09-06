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
        require_once VTAZAS.'list.php';
    }

}
?>
