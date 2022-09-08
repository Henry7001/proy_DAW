<?php
require_once "config/Conexion.php";
require_once "model/dto/GorrasDto.php";
//adaptado a gorras- falta cambiar los sql sentencias
class GorrasDao
{
    private $con;

    static private $getAll = "SELECT * FROM gorras";
    static private $getBySize = "SELECT * FROM gorras WHERE  (UPPER(talla) LIKE UPPER(:talla) OR :talla = '')";
    static private $getById = "SELECT * FROM gorras WHERE  id= :id";
    static private $create = "INSERT INTO gorras (id, diseño, talla, precio, cantidad) VALUES (:id, :diseno, :talla, :precio, :cantidad)";
    static private $update = "UPDATE gorras SET diseño=:diseno, talla=:talla, precio=:precio, cantidad=:cantidad WHERE id=:id";


    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }


    public function getAll()
    {
        $stmt = $this->con->prepare(GorrasDao::$getAll);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->con->prepare(GorrasDao::$getById);
        $data = ["id" => $id];
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getBySize($size)
    {
        $stmt = $this->con->prepare(GorrasDao::$getBySize);
        $size = "%".$size."%";
        $data = ["talla" => $size];
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(GorrasDto $gorras)
    {
        try {
            $stmt = $this->con->prepare(GorrasDao::$create);
            $data = [
                "id" => $gorras->getId(),
                "diseno" => $gorras->getDiseno(),
                "talla" => $gorras->getTalla(),
                "precio" => $gorras->getPrecio(),
                "cantidad" => $gorras->getCantidad(),
            ];
            $stmt->execute($data);
            return ($stmt->rowCount() > 0);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update(GorrasDto $gorras)
    {
        try {
            $stmt = $this->con->prepare(GorrasDao::$update);
            $data = [
                "id" => $gorras->getId(),
                "diseno" => $gorras->getDiseno(),
                "talla" => $gorras->getTalla(),
                "precio" => $gorras->getPrecio(),
                "cantidad" => $gorras->getCantidad(),
            ];
            $stmt->execute($data);
            return ($stmt->rowCount() > 0);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }


}