<?php

namespace App\Domain\Alumno\Repository;

use App\Domain\Alumno\Data\AlumnoData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class AlumnoReaderRepository
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * The constructor.
     *
     * @param Connection $connection The database connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    // Obtener alumno por ID
    public function getAlumnoById(int $alumnoId): array
    {
        $row = $this->connection->table('alumno')->find($alumnoId);

        if (!$row) throw new \DomainException(sprintf('Alumno no encontrado: %s', $alumnoId));

        return (array) $row;
    }
	
	// Búsqueda de alumnos
    public function busqueda($busqueda): array
    {
        $rows = $this->connection->table('alumno')->where('nombre', 'LIKE', '%'.$busqueda.'%')->get();

        return (array) $rows;
    }

    // Obtener todos los alumnos
    public function getAll()
    {
        $rows = $this->connection->table('alumno')->get();
        
        return $rows;
    }
}