<?php
require_once "config/Conexion.php";
require_once "model/dto/TazasDto.php";
class TazasDao
{
    private $con;

    static private $getByTamano = "SELECT * FROM tazas WHERE  (UPPER(tamaño) LIKE UPPER(:tamano) OR :tamano = '')";
    static private $getAll = "SELECT * FROM tazas";
    static private $create = "INSERT INTO tazas (nombre, tamaño, descripcion, valor, cantidad, fechaactualizacion) VALUES ( :nombre, :tamano, :descripcion, :valor, :cantidad, :fecha)";
    static private $update = "UPDATE tazas SET nombre = :nombre, tamaño = :tamano, descripcion = :descripcion, valor = :valor, cantidad = :cantidad, fechaactualizacion = :fecha WHERE id = :id";
    public function __construct()
    {
        $this->con = Conexion::getConexion();
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
            //un alert en javascript llamado desde php
            echo "<script>console.log($e->getMessage());</script>";
             //
            return false;
        }
    }

    public function getByTamano($tamano)
    {
        $stmt = $this->con->prepare(TazasDao::$getByTamano);
        $size = "%".$tamano."%";
        $data = ["tamano" => $tamano];
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>