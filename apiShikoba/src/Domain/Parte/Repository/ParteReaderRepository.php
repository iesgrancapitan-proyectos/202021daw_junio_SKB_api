<?php

namespace App\Domain\Parte\Repository;

use App\Domain\Parte\Data\ParteData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class ParteReaderRepository
{
    /**
     * @var Connection
     */
    private $connection;
    private $baseSQL;

    /**
     * The constructor.
     *
     * @param Connection $connection The database connection
     */
    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Devuelve parte por ID
     */
    public function getById(int $parteId): array    
    {
        $row = ParteData::find($parteId)->toArray();
        $row['idAlumno'] = ParteData::find($parteId)->alumno->toArray();
        
        if (!$row) throw new \DomainException(sprintf('Parte no encontrado: %s', $parteId));

        return (array) $row;
    }

    /**
     * Partes puestos por un profesor
     *
     * @param int $profesorID The user
     *
     * @return array array con los partes puestos por el profesor
     */
    public function getByIdProfesor(int $profesorId): array
    {
        // Cargamos los partes del profesor
        $partes = ParteData::where('idProfesor','=',$profesorId)->get()->toArray();

        // Array para devolver que incluirá los datos del  alumno 
        $resultado= [];

        // Recorremos los partes y cargamos datos del alumno
        foreach ($partes as $valor) {
            $parteId = $valor['id'];
            $valor['idAlumno']=ParteData::find($parteId)->alumno->toArray();
            $resultado[] = $valor;
        }

        return (array) $resultado;
    }
	
	public function getByAlumnoFecha(int $alumnoId, string $fechaDesde, string $fechaHasta): array
    {
        // Cargamos los partes del profesor
        $partes = ParteData::whereRaw('idAlumno = '.$alumnoId.' AND fecha BETWEEN \''.$fechaDesde.'\' AND \''.$fechaHasta.'\'')->get()->toArray();

        // Array para devolver que incluirá los datos del  alumno 
        $resultado= [];

        // Recorremos los partes y cargamos datos del alumno
        foreach ($partes as $valor) {
            $parteId = $valor['id'];
            $valor['idAlumno']=ParteData::find($parteId)->alumno->toArray();
            $resultado[] = $valor;
        }

        return (array) $resultado;
    }
}