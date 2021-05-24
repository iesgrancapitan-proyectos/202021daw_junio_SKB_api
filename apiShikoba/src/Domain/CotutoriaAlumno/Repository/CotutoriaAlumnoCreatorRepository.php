<?php

namespace App\Domain\CotutoriaAlumno\Repository;

use PDO;

/**
 * Repository.
 */
class CotutoriaAlumnoCreatorRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert user row.
     *
     * @param array $user The user
     *
     * @return int The new ID
     */
    public function insertCotutoriaAlumno(array $cotutoria_alumno): int
    {
        $row = [
            'idAlumno' => $cotutoria_alumno['idAlumno'],
            'idProfesor' => $cotutoria_alumno['idProfesor'],
            'idMateria' => $cotutoria_alumno['idMateria'],
            'fecha' => $cotutoria_alumno['fecha'],
            'hora' => $cotutoria_alumno['hora'],
            'actitud' => $cotutoria_alumno['actitud'],
            'comportamiento' => $cotutoria_alumno['comportamiento'],
        ];

        $sql = "INSERT INTO alumno_cotutoria SET 
                idAlumno=:idAlumno, 
                idProfesor=:idProfesor, 
                idMateria=:idMateria, 
                fecha=:fecha,
                hora=:hora,
                actitud=:actitud,
                comportamiento=:comportamiento;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }
}
