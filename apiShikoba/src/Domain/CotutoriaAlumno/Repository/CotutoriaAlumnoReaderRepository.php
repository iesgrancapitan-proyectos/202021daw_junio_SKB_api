<?php

namespace App\Domain\CotutoriaAlumno\Repository;

use App\Domain\CotutoriaAlumno\Data\CotutoriaAlumnoData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class CotutoriaAlumnoReaderRepository
{
    private $connection;
    private $baseSQL;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getByIdAlumno(int $id_alumno): array
    {
        $cotutoriasAlumno = CotutoriaAlumnoData::where('idAlumno','=',$id_alumno)->get()->toArray();

        $resultado= [];

        foreach ($cotutoriasAlumno as $valor) {
            $valor['idAlumno']=CotutoriaAlumnoData::find($valor['id'])->alumno->toArray();
            $valor['idMateria']=CotutoriaAlumnoData::find($valor['id'])->materia->toArray();
            $valor['idActitud']=CotutoriaAlumnoData::find($valor['id'])->actitud->toArray();
            $valor['idComportamiento']=CotutoriaAlumnoData::find($valor['id'])->comportamiento->toArray();
            $resultado[] = $valor;
        }

        return (array) $resultado;
    }

    public function getByAlumnoFecha(int $idAlumno, string $fecha): array
    {
        $cotutorias = CotutoriaAlumnoData::whereRaw('idAlumno = '.$idAlumno.' AND fecha = \''.$fecha.'\'')->get()->toArray();

        $resultado= [];

        foreach ($cotutorias as $valor) {
            $valor['idProfesor'] = CotutoriaAlumnoData::find($valor['id'])->profesor->toArray();
            $valor['idAlumno'] = CotutoriaAlumnoData::find($valor['id'])->alumno->toArray();
            $valor['idMateria'] = CotutoriaAlumnoData::find($valor['id'])->materia->toArray();
            $valor['idActitud'] = CotutoriaAlumnoData::find($valor['id'])->actitud->toArray();
            $valor['idComportamiento'] = CotutoriaAlumnoData::find($valor['id'])->comportamiento->toArray();
            $resultado[] = $valor;
        }

        return (array) $resultado;
    }
}
