<?php
//autor: Jean Paolo Alvarez
class GorrasDto
{
    private $id;
    private $diseno;
    private $talla;
    private $precio;
    private $cantidad;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDiseno()
    {
        return $this->diseno;
    }

    public function setDiseno($diseno)
    {
        $this->diseno = $diseno;
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
}