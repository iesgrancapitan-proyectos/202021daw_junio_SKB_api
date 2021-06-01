<?php

namespace App\Domain\CotutoriaAlumno\Repository;

use PDO;

class CotutoriaAlumnoCreatorRepository
{
    private $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function insertCotutoriaAlumno(array $cotutoria_alumno): int
    {
		$sql = "INSERT INTO alumno_cotutoria (idAlumno, idProfesor, idMateria, fecha, hora, idActitud, idComportamiento) VALUES (:idAlumno, :idProfesor, :idMateria, :fecha, :hora, :idActitud, :idComportamiento)";
		
		$stmt = $this->connection->prepare($sql);
		$stmt->bindParam(':idAlumno', $cotutoria_alumno['idAlumno']);
		$stmt->bindParam(':idProfesor', $cotutoria_alumno['idProfesor']);
		$stmt->bindParam(':idMateria', $cotutoria_alumno['idMateria']);
		$stmt->bindParam(':fecha', $cotutoria_alumno['fecha']);
		$stmt->bindParam(':hora', $cotutoria_alumno['hora']);
		$stmt->bindParam(':idActitud', $cotutoria_alumno['idActitud']);
		$stmt->bindParam(':idComportamiento', $cotutoria_alumno['idComportamiento']);
		$stmt->execute();

        return (int)$this->connection->lastInsertId();
    }
}
