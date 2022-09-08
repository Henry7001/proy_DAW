/* JEAN PAOLO ALVAREZ VELEZ */
<?php
require_once "config/Conexion.php";
require_once "model/dto/gorraDto.php";
class gorraDao
{
    private $con;

    static private $getAll = "SELECT * FROM gorras";
    static private $getBySize = "SELECT * FROM gorras WHERE  (UPPER(talla) LIKE UPPER(:talla) OR :talla = '')";
    static private $getById = "SELECT * FROM gorras WHERE  id= :id";
    static private $create = "INSERT INTO gorras (diseño, talla, precio, cantidad, fecha_actualizacion) VALUES ( :diseño, :talla, :precio, :cantidad, :fecha)";
    static private $update = "UPDATE gorras SET diseño=:diseño, talla=:talla, precio=:precio, cantidad=:cantidad,  fecha_actualizacion=:fecha WHERE id=:id";
    static private $delete = "DELETE FROM gorras WHERE id=:id";


    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }


    public function getAll()
    {
        $stmt = $this->con->prepare(gorraDao::$getAll);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id){
        $stmt = $this->con->prepare(gorraDao::$delete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getById($id)
    {
        $stmt = $this->con->prepare(gorraDao::$getById);
        $data = ["id" => $id];
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getBySize($size)
    {
        $stmt = $this->con->prepare(gorraDao::$getBySize);
        $size = "%".$size."%";
        $data = ["talla" => $size];
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(gorraDto $gorra)
    {
        try {
            $stmt = $this->con->prepare(gorraDao::$create);
            $data = [
                "diseño" => $gorra->getDiseño(),
                "talla" => $gorra->getTalla(),
                "precio" => $gorra->getPrecio(),
                "cantidad" => $gorra->getCantidad(),
                "fecha" => $gorra->getFechaActualizacion(),
            ];
            $stmt->execute($data);
            return ($stmt->rowCount() > 0);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update(gorraDto $gorra)
    {
        try {
            $stmt = $this->con->prepare(gorraDao::$update);
            $data = [
                "id" => $gorra->getId(),
                "diseño" => $gorra->getDiseño(),
                "talla" => $gorra->getTalla(),
                "precio" => $gorra->getPrecio(),
                "cantidad" => $gorra->getCantidad(),
                "fecha" => $gorra->getFechaActualizacion(),
            ];
            $stmt->execute($data);
            return ($stmt->rowCount() > 0);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }


}
