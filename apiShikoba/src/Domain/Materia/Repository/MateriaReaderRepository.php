<?php

namespace App\Domain\Materia\Repository;

use App\Domain\Materia\Data\MateriaData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class MateriaReaderRepository
{
    private $connection;
    private $baseSQL;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getById(int $id_materia): array
    {
        $materias = MateriaData::where('id','=',$id_materia)->get()->toArray();

        return (array) $materias;
    }

    public function getAll()
    {
        $materias = MateriaData::all()->toArray();
        return (array) $materias;
    }
}
