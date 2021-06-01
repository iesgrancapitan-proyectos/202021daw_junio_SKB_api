<?php

namespace App\Domain\Cotutoria\Repository;

use App\Domain\Cotutoria\Data\CotutoriaData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class CotutoriaReaderRepository
{
    private $connection;
    private $baseSQL;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getByIdProfesor(int $id_profesor): array
    {
        $cotutorias = CotutoriaData::where('idProfesor','=',$id_profesor)->get()->toArray();
        
        $resultado= [];

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
