<?php

namespace App\Domain\ParteSancion\Repository;

use PDO;

class ParteSancionCreatorRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertParteSancion(array $parte_sancion): int
    {
        $sql = "INSERT INTO sanciones_partes (sanciones_id, partes_id) VALUES (:sanciones_id, :partes_id)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':sanciones_id', $parte_conducta['sanciones_id']);
        $stmt->bindParam(':partes_id', $parte_conducta['partes_id']);
        $stmt->execute();

        return (int)$this->connection->lastInsertId();
    }
}
