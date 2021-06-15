<?php

namespace App\Domain\Sancion\Repository;

use PDO;

class SancionCreatorRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertSancion(array $sancion): int
    {
        $sql = "INSERT INTO sanciones (fecha, fechaInicio, fechaFinal, sancion, observaciones, evaluacion, puntosRecuperados, idTipo, idEstado, idAlumno, fechaConfirmacion, fechaComunicacion) VALUES (:fecha, :fechaInicio, :fechaFinal, :sancion, :observaciones, :evaluacion, :puntosRecuperados, :idTipo, :idEstado, :idAlumno, :fechaConfirmacion, :fechaComunicacion)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':fecha', $parte['fecha']);
        $stmt->bindParam(':fechaInicio', $parte['fechaInicio']);
        $stmt->bindParam(':fechaFinal', $parte['fechaFinal']);
        $stmt->bindParam(':sancion', $parte['sancion']);
        $stmt->bindParam(':observaciones', $parte['observaciones']);
        $stmt->bindParam(':evaluacion', $parte['evaluacion']);
        $stmt->bindParam(':puntosRecuperados', $parte['puntosRecuperados']);
        $stmt->bindParam(':idTipo', $parte['idTipo']);
        $stmt->bindParam(':idEstado', $parte['idEstado']);
        $stmt->bindParam(':idAlumno', $parte['idAlumno']);
        $stmt->bindParam(':fechaConfirmacion', $parte['fechaConfirmacion']);
        $stmt->bindParam(':fechaComunicacion', $parte['fechaComunicacion']);
        $stmt->execute();

        return (int)$this->connection->lastInsertId();
    }
}
