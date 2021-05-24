<?php

namespace App\Domain\Cotutoria\Repository;

use App\Domain\Cotutoria\Data\CotutoriaData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class CotutoriaReaderRepository
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
     * Cotutorias de un profesor
     *
     * @param int $profesorID The user
     *
     * @return array array con las cotutorias del profesor
     */
    public function getByIdProfesor(int $id_profesor): array
    {
        // Cargamos las cotutorias del profesor
        $cotutorias = CotutoriaData::where('idProfesor','=',$id_profesor)->get()->toArray();
        
        // Array para devolver que incluirá los datos del alumno 
        $resultado= [];

        // Recorremos los partes y cargamos datos del alumno.
        foreach ($cotutorias as $valor) {
            $valor['idAlumno']=CotutoriaData::find($valor['id'])->alumno->toArray();
            $resultado[] = $valor;
        }

        return (array) $resultado;
    }

    public function getAll()
    {
        $cotutorias = CotutoriaData::all()->toArray();
        
        $resultado= [];

        foreach ($cotutorias as $valor) {
            $valor['idAlumno']=CotutoriaData::find($valor['id'])->alumno->toArray();
            $valor['idProfesor']=CotutoriaData::find($valor['id'])->profesor->toArray();
            $resultado[] = $valor;
        }

        return (array) $resultado;
    }
}