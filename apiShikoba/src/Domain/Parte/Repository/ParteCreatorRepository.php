<?php

namespace App\Domain\Parte\Repository;

use PDO;

class ParteCreatorRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertParte(array $parte): int
    {
        $sql = "INSERT INTO partes (fecha, descripcion, tareas, horaSalidaAula, horaLlegadaJefatura, formato, observacion, puntos, idTipo, idAlumno, idProfesor, idEstado, recupera, fechaConfirmacion, fechaComunicacion, numero) VALUES (:fecha, :descripcion, :tareas, :horaSalidaAula, :horaLlegadaJefatura, :formato, :observacion, :puntos, :idTipo, :idAlumno, :idProfesor, :idEstado, :recupera, :fechaConfirmacion, :fechaComunicacion, :numero)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':fecha', $parte['fecha']);
        $stmt->bindParam(':descripcion', $parte['descripcion']);
        $stmt->bindParam(':tareas', $parte['tareas']);
        $stmt->bindParam(':horaSalidaAula', $parte['horaSalidaAula']);
        $stmt->bindParam(':horaLlegadaJefatura', $parte['horaLlegadaJefatura']);
        $stmt->bindParam(':formato', $parte['formato']);
        $stmt->bindParam(':observacion', $parte['observacion']);
        $stmt->bindParam(':puntos', $parte['puntos']);
        $stmt->bindParam(':idTipo', $parte['idTipo']);
        $stmt->bindParam(':idAlumno', $parte['idAlumno']);
        $stmt->bindParam(':idProfesor', $parte['idProfesor']);
        $stmt->bindParam(':idEstado', $parte['idEstado']);
        $stmt->bindParam(':recupera', $parte['recupera']);
        $stmt->bindParam(':fechaConfirmacion', $parte['fechaConfirmacion']);
        $stmt->bindParam(':fechaComunicacion', $parte['fechaComunicacion']);
        $stmt->bindParam(':numero', $parte['numero']);
        $stmt->execute();

        return (int)$this->connection->lastInsertId();
    }
}
