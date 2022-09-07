<?php
//autor:Henry Miguel Ruiz Reyes
require_once "config/Conexion.php";
require_once "model/dto/TazasDto.php";
class TazasDao
{
    private $con;

    static private $getByTamano = "SELECT * FROM tazas WHERE  (UPPER(tamaño) LIKE UPPER(:tamano) OR :tamano = '')";
    static private $getAll = "SELECT * FROM tazas";
    static private $create = "INSERT INTO tazas (nombre, tamaño, descripcion, valor, cantidad, fechaactualizacion) VALUES ( :nombre, :tamano, :descripcion, :valor, :cantidad, :fecha)";
    static private $update = "UPDATE tazas SET nombre = :nombre, tamaño = :tamano, descripcion = :descripcion, valor = :valor, cantidad = :cantidad, fechaactualizacion = :fecha WHERE id = :id";
    static private $getById = "SELECT * FROM tazas WHERE  id= :id";
    static private $delete = "DELETE FROM tazas WHERE id = :id";

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function getById($id)
    {
        $stmt = $this->con->prepare(TazasDao::$getById);
        $data = ["id" => $id];
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $stmt = $this->con->prepare(TazasDao::$delete);
        $data = ["id" => $id];
        return $stmt->execute($data);
    }

    public function update(TazasDto $tazas)
    {
        try {
            $stmt = $this->con->prepare(TazasDao::$update);
            $data = [
                "id" => $tazas->getId(),
                "nombre" => $tazas->getNombre(),
                "tamano" => $tazas->getTamano(),
                "descripcion" => $tazas->getDescripcion(),
                "valor" => $tazas->getValor(),
                "cantidad" => $tazas->getCantidad(),
                "fecha" => $tazas->getFechaActualizacion(),
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
        $stmt = $this->con->prepare(TazasDao::$getAll);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(TazasDto $tazas)
    {
        try {
            $stmt = $this->con->prepare(TazasDao::$create);
            $data = [
                "nombre" => $tazas->getNombre(),
                "tamano" => $tazas->getTamano(),
                "descripcion" => $tazas->getDescripcion(),
                "valor" => $tazas->getValor(),
                "cantidad" => $tazas->getCantidad(),
                "fecha" => $tazas->getFechaActualizacion(),
            ];
            $stmt->execute($data);
            return ($stmt->rowCount() > 0);
        } catch (Exception $e) {
            $e->getMessage();
            return false;
        }
    }


    public function getByTamano($tamano)
    {
        $stmt = $this->con->prepare(TazasDao::$getByTamano);
        $tamano = "%".$tamano."%";
        $data = ["tamano" => $tamano];
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>