<?php
//autor:Henry Miguel Ruiz Reyes
class TazasDto
{
    private $id;
    private $nombre;
    private $tamano;
    private $descripcion;
    private $valor;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getTamano()
    {
        return $this->tamano;
    }

    public function setTamano($tamano)
    {
        $this->tamano = $tamano;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
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

    public function setFechaactualizacion($fechaActualizacion)
    {
        $this->fechaActualizacion = $fechaActualizacion;
    }
}
?>