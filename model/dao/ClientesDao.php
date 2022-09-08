<?php
// autor: Solórzano Zambrano Ricardo
require_once "config/Conexion.php";
require_once "model/dto/ClientesDto.php";

class ClientesDao
{
    private $con;

    static private $getAll = "SELECT * FROM clientes";
    static private $getByName = "SELECT * FROM clientes WHERE  (UPPER(nombre) LIKE UPPER(:nombre) OR :nombre = '')";
    static private $getById = "SELECT * FROM clientes WHERE  id= :id";
    static private $create = "INSERT INTO clientes (id, nombre, apellido, documento, registro) VALUES ( :id, :nombre, :apellido, :documento, :registro)";
    static private $update = "UPDATE clientes SET nombre=:nombre, apellido=:apellido, documento=:documento, registro=:registro WHERE id=:id";
    static private $delete = "DELETE FROM clientes WHERE id=:id";


    public function __construct()
    {
        $this->con = Conexion::getConexion();
    }

    //funcion delete
    public function delete($id){
        $stmt = $this->con->prepare(ClientesDao::$delete);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getAll()
    {
        $stmt = $this->con->prepare(ClientesDao::$getAll);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->con->prepare(ClientesDao::$getById);
        $data = ["id" => $id];
        $stmt->execute($data);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getByName($name)
    {
        $stmt = $this->con->prepare(ClientesDao::$getByName);
        $name = "%".$name."%";
        $data = ["nombre" => $name];
        $stmt->execute($data);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(ClientesDto $clientes)
    {
        try {
            $stmt = $this->con->prepare(ClientesDao::$create);
            $data = [
                "id" => $clientes->getId(),
                "nombre" => $clientes->getNombre(),
                "apellido" => $clientes->getApellido(),
                "documento" => $clientes->getDocumento(),
                "registro" => $clientes->getRegistro(),
            ];
            $stmt->execute($data);
            return ($stmt->rowCount() > 0);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function update(ClientesDto $clientes)
    {
        try {
            $stmt = $this->con->prepare(ClientesDao::$update);
            $data = [
                "id" => $clientes->getId(),
                "nombre" => $clientes->getNombre(),
                "apellido" => $clientes->getApellido(),
                "documento" => $clientes->getDocumento(),
                "registro" => $clientes->getRegistro(),
            ];
            $stmt->execute($data);
            return ($stmt->rowCount() > 0);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }


}