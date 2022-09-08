<?php
//autor:Dave Steven Delgado Galdea
require_once "config/Conexion.php";
require_once "model/dto/ProveedoresDto.php";
class ProveedoresDao
{
    private $con;
	//QUERYS
    static private $getByDesc = "SELECT * FROM Proveedores WHERE  (UPPER(descripcion) LIKE UPPER(:descripcion) OR :descripcion = '')";
    static private $getAll = "SELECT * FROM Proveedores";
    static private $create = "INSERT INTO Proveedores (descripcion, tiempoContrato, tipoContrato, anioInicioContrato, anioFinContrato, fechaIngreso) VALUES ( :descripcion, :tiempoContrato, :tipoContrato, :anioInicioContrato, :anioFinContrato, :fecha)";
    static private $update = "UPDATE Proveedores SET descripcion = :descripcion, tiempoContrato = :tiempoContrato, tipoContrato = :tipoContrato, anioInicioContrato = :anioInicioContrato, anioFinContrato = :anioFinContrato, fechaIngreso = :fecha WHERE id = :id";
    static private $getById = "SELECT * FROM Proveedores WHERE  id= :id";
    static private $deletebyId = "DELETE FROM Proveedores WHERE  id= :id";

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function getById($id)
    {
        $stmt = $this->con->prepare(ProveedoresDao::$getById);
        $data = ["id" => $id];
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
	
	public function deletebyId($id)
    {
        $stmt = $this->con->prepare(ProveedoresDao::$deletebyId);
        $data = ["id" => $id];
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(ProveedoresDto $Proveedores)
    {
        try {
            $stmt = $this->con->prepare(ProveedoresDao::$update);
            $data = [
                "id" => $Proveedores->getId(),
                "descripcion" => $Proveedores->getDescripcion(),
                "tiempoContrato" => $Proveedores->getTiempoContrato(),
                "tipoContrato" => $Proveedores->getTipoContrato(),
                "anioInicioContrato" => $Proveedores->getAnioInicioContrato(),
                "anioFinContrato" => $Proveedores->getAnioFinContrato(),
                "fecha" => $Proveedores->getFechaIngreso(),
            ];
            $stmt->execute($data);
            return ($stmt->rowCount() > 0);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAll()
    {
        $stmt = $this->con->prepare(ProveedoresDao::$getAll);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(ProveedoresDto $Proveedores)
    {
        try {
            $stmt = $this->con->prepare(ProveedoresDao::$create);
            $data = [
                "descripcion" => $Proveedores->getDescripcion(),
                "tiempoContrato" => $Proveedores->getTiempoContrato(),
                "tipoContrato" => $Proveedores->getTipoContrato(),
                "anioInicioContrato" => $Proveedores->getAnioInicioContrato(),
                "anioFinContrato" => $Proveedores->getAnioFinContrato(),
                "fecha" => $Proveedores->getFechaIngreso(),
            ];
            $stmt->execute($data);
            return ($stmt->rowCount() > 0);
        } catch (Exception $e) {
            $e->getMessage();
            return false;
        }
    }


    public function getByDesc($descripcion)
    {
        $stmt = $this->con->prepare(ProveedoresDao::$getByDesc);
        $descripcion = "%".$descripcion."%";
        $data = ["descripcion" => $descripcion];
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
