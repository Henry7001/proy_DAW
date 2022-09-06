<?php
require_once "config/Conexion.php";
require_once "model/dto/ShirtDto.php";

class ShirtDao
{
    private $con;

    static private $getAll = "SELECT * FROM camisas";
    static private $getBySize = "SELECT * FROM camisas WHERE  (UPPER(talla) LIKE UPPER(:talla) OR :talla = '')";
    static private $getById = "SELECT * FROM camisas WHERE  id= :id";
    static private $create = "INSERT INTO camisas(modelo, talla, precio, tela, cantidad, fecha_actualizacion) VALUES ( :modelo, :talla, :precio, :tela, :cantidad, :fecha)";
    static private $update = "UPDATE camisas SET modelo=:modelo, talla=:talla, precio=:precio, tela=:tela, cantidad=:cantidad,  fecha_actualizacion=:fecha WHERE id=:id";


    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }


    public function getAll()
    {
        $stmt = $this->con->prepare(ShirtDao::$getAll);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->con->prepare(ShirtDao::$getById);
        $data = ["id" => $id];
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getBySize($size)
    {
        $stmt = $this->con->prepare(ShirtDao::$getBySize);
        $size = "%".$size."%";
        $data = ["talla" => $size];
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(ShirtDto $shirt)
    {
        try {
            $stmt = $this->con->prepare(ShirtDao::$create);
            $data = [
                "modelo" => $shirt->getModelo(),
                "talla" => $shirt->getTalla(),
                "precio" => $shirt->getPrecio(),
                "tela" => $shirt->getTela(),
                "cantidad" => $shirt->getCantidad(),
                "fecha" => $shirt->getFechaActualizacion(),
            ];
            $stmt->execute($data);
            return ($stmt->rowCount() > 0);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update(ShirtDto $shirt)
    {
        try {
            $stmt = $this->con->prepare(ShirtDao::$update);
            $data = [
                "id" => $shirt->getId(),
                "modelo" => $shirt->getModelo(),
                "talla" => $shirt->getTalla(),
                "precio" => $shirt->getPrecio(),
                "tela" => $shirt->getTela(),
                "cantidad" => $shirt->getCantidad(),
                "fecha" => $shirt->getFechaActualizacion(),
            ];
            $stmt->execute($data);
            return ($stmt->rowCount() > 0);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }


}