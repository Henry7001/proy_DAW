<?php

require_once 'config/config.php';

class FrontController
{
    public function ruteo()
    {
        $controlador = (!empty($_REQUEST['type'])) ? htmlentities($_REQUEST['type']) : CONTROLADOR_PRINCIPAL;
        $controlador = ucwords(strtolower($controlador)) . "Controller";
        $funcion = (!empty($_REQUEST['function'])) ? htmlentities($_REQUEST['function']) : FUNCION_PRINCIPAL;
        

        require_once 'controller/'.$controlador . '.php';
        $cont = new  $controlador();
        $cont->$funcion();
    }

}
