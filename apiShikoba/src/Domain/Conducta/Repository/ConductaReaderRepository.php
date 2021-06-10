<?php

namespace App\Domain\Conducta\Repository;

use App\Domain\Conducta\Data\ConductaData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class ConductaReaderRepository
{
    private $connection;
    private $baseSQL;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getById(int $id_conducta): array
    {
        $conductas = ConductaData::where('id','=',$id_conducta)->get()->toArray();

        return (array) $conductas;
    }

    public function getAllConductas()
    {
        $conductas = ConductaData::all()->toArray();
        return (array) $conductas;
    }
}
