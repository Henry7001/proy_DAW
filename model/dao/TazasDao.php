<?php
//DAO de tazas sin "//" en el codigo
class TazasDao
{
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM tazas");
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $taz = new TazasDto();

                $taz->__SET('id', $r->id);
                $taz->__SET('nombre', $r->nombre);
                $taz->__SET('tamano', $r->tamano);
                $taz->__SET('descripcion', $r->descripcion);
                $taz->__SET('valor', $r->valor);
                $taz->__SET('cantidad', $r->cantidad);

                $result[] = $taz;
            }

            return $result;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM tazas WHERE id = ?");

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $taz = new TazasDto();

            $taz->__SET('id', $r->id);
            $taz->__SET('nombre', $r->nombre);
            $taz->__SET('tamano', $r->tamano);
            $taz->__SET('descripcion', $r->descripcion);
            $taz->__SET('valor', $r->valor);
            $taz->__SET('cantidad', $r->cantidad);

            return $taz;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM tazas WHERE id = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar(TazasDto $data)
    {
        try {
            $sql = "UPDATE tazas SET
                        nombre = ?,
                        tamano = ?,
                        descripcion = ?,
                        valor = ?,
                        cantidad = ?
                    WHERE id = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->__GET('nombre'),
                        $data->__GET('tamano'),
                        $data->__GET('descripcion'),
                        $data->__GET('valor'),
                        $data->__GET('cantidad'),
                        $data->__GET('id')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Registrar(TazasDto $data)
    {
        try {
            $sql = "INSERT INTO tazas (nombre,tamano,descripcion,valor,cantidad)
                VALUES (?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->__GET('nombre'),
                        $data->__GET('tamano'),
                        $data->__GET('descripcion'),
                        $data->__GET('valor'),
                        $data->__GET('cantidad')
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}

?>