<?php
//adaptado a gorras, falta cambiar los atributos
class gorraDto
{
    private $id;
    private $diseño;
    private $talla;
    private $precio;
    private $cantidad;
    private $fechaActualizacion;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDiseño()
    {
        return $this->diseño;
    }

    public function setDiseño($diseño)
    {
        $this->diseño = $diseño;
    }

    public function getTalla()
    {
        return $this->talla;
    }

    public function setTalla($talla)
    {
        $this->talla = $talla;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getFechaActualizacion()
    {
        return $this->fechaActualizacion;
    }

    public function setFechaActualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;
    }
}