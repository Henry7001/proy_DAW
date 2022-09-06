<?php
require_once "config/Conexion.php";
class TazasDao
{
    private $con;

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

    public function alter($id, $nombre, $tamano, $descripcion, $valor, $cantidad)
    {
        $stmt = $this->con->prepare("UPDATE tazas SET nombre=:nombre, tamano=:tamano, descripcion=:descripcion, valor=:valor, cantidad=:cantidad WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':tamano', $tamano);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->execute();
    }
}
?>