<?php
//autor:Dave Steven Delgado Galdea 
class ProveedoresDto
{
    private $id;
    private $descripcion;
    private $tiempoContrato;
    private $tipoContrato;
    private $anioInicioContrato;
    private $anioFinContrato;
	private $fechaIngreso;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
	
	public function getTiempoContrato()
    {
        return $this->tiempoContrato;
    }

    public function setTiempoContrato($tiempoContrato)
    {
        $this->tiempoContrato = $tiempoContrato;
    }
	
	public function getTipoContrato()
    {
        return $this->tipoContrato;
    }

    public function setTipoContrato($tipoContrato)
    {
        $this->tipoContrato = $tipoContrato;
    }
	
	public function getAnioInicioContrato()
    {
        return $this->anioInicioContrato;
    }

    public function setAnioInicioContrato($anioInicioContrato)
    {
        $this->anioInicioContrato = $anioInicioContrato;
    }
	
	public function getAnioFinContrato()
    {
        return $this->anioFinContrato;
    }

    public function setAnioFinContrato($anioFinContrato)
    {
        $this->anioFinContrato = $anioFinContrato;
    }
	
	public function getFechaIngreso()
    {
        return $this->fechaIngreso;
    }

    public function setFechaIngreso($fechaIngreso)
    {
        $this->fechaIngreso = $fechaIngreso;
    }

}
?>