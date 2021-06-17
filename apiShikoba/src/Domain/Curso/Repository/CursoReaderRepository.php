<?php

namespace App\Domain\Curso\Repository;

use App\Domain\Curso\Data\CursoData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class CursoReaderRepository
{
    private $connection;
    private $baseSQL;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getById(int $id_curso): array
    {
        $cursos = CursoData::where('id','=',$id_curso)->get()->toArray();

        return (array) $cursos;
    }

    public function getAll()
    {
        $cursos = CursoData::all()->toArray();
        return (array) $cursos;
    }
}
