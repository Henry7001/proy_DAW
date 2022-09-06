<?php
require_once "config/Conexion.php";
class TazasDao
{
    private $con;

    static private $getByTamano = "SELECT * FROM tazas WHERE  (UPPER(tamaño) LIKE UPPER(:tamano) OR :tamano = '')";

    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    public function getAll()
    {
        $stmt = $this->con->prepare("SELECT * FROM tazas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($nombre, $tamano, $descripcion, $valor, $cantidad)
    {
        $stmt = $this->con->prepare("INSERT INTO tazas (nombre, tamano, descripcion, valor, cantidad) VALUES (:nombre, :tamano, :descripcion, :valor, :cantidad)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':tamano', $tamano);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->execute();
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