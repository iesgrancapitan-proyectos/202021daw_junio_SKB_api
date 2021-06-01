<?php

namespace App\Domain\Parte\Repository;

use App\Domain\Parte\Data\ParteData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class ParteReaderRepository
{
    private $connection;
    private $baseSQL;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getById(int $parteId): array    
    {
        $row = ParteData::find($parteId)->toArray();
        $row['idAlumno'] = ParteData::find($parteId)->alumno->toArray();
        
        if (!$row) throw new \DomainException(sprintf('Parte no encontrado: %s', $parteId));

        return (array) $row;
    }

    public function getByIdProfesor(int $profesorId): array
    {
        $partes = ParteData::where('idProfesor','=',$profesorId)->get()->toArray();

        $resultado= [];

        foreach ($partes as $valor) {
            $parteId = $valor['id'];
            $valor['idAlumno']=ParteData::find($parteId)->alumno->toArray();
            $resultado[] = $valor;
        }

        return (array) $resultado;
    }
    
    public function getByAlumnoFecha(int $alumnoId, string $fechaDesde, string $fechaHasta): array
    {
        $partes = ParteData::whereRaw('idAlumno = '.$alumnoId.' AND fecha BETWEEN \''.$fechaDesde.'\' AND \''.$fechaHasta.'\'')->get()->toArray();

        $resultado= [];

        foreach ($partes as $valor) {
            $parteId = $valor['id'];
            $valor['idAlumno']=ParteData::find($parteId)->alumno->toArray();
            $resultado[] = $valor;
        }

        return (array) $resultado;
    }
}
