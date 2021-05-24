<?php

namespace App\Domain\CotutoriaAlumno\Repository;

use App\Domain\CotutoriaAlumno\Data\CotutoriaAlumnoData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class CotutoriaAlumnoReaderRepository
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
     * Registros de cotutorías de un alumno
     *
     * @param int $id_alumno ID del alumno
     *
     * @return array array con los registros de cotutorías del alumno
     */
    public function getByIdAlumno(int $id_alumno): array
    {
        // Cargamos los registros de cotutorías del alumno
        $cotutoriasAlumno = CotutoriaAlumnoData::where('idAlumno','=',$id_alumno)->get()->toArray();

        // Array para devolver que incluirá los datos del alumno 
        $resultado= [];

        // Recorremos los partes y cargamos datos del alumno.
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
        // Cargamos los partes del profesor
        $cotutorias = CotutoriaAlumnoData::where('idAlumno','=',$alumnoId)->where('fecha', '=', $fecha)->get()->toArray();

        // Array para devolver que incluirá los datos del  alumno 
        $resultado= [];

        // Recorremos los partes y cargamos datos del alumno
        foreach ($cotutorias as $valor) {
            $parteId = $valor['id'];
            $valor['idAlumno']=CotutoriaAlumnoData::find($parteId)->alumno->toArray();
            $resultado[] = $valor;
        }

        return (array) $resultado;
    }
}