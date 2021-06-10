<?php

namespace App\Domain\ParteConducta\Repository;

use PDO;

class ParteConductaCreatorRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertParteConducta(array $parte_conducta): int
    {
        $sql = "INSERT INTO partes_conductas (partes_id, conductas_id) VALUES (:partes_id, :conductas_id)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':partes_id', $parte_conducta['partes_id']);
        $stmt->bindParam(':conductas_id', $parte_conducta['conductas_id']);
        $stmt->execute();

        return (int)$this->connection->lastInsertId();
    }
}
