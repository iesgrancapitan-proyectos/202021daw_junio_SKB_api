<?php

namespace App\Domain\Comportamiento\Repository;

use App\Domain\Comportamiento\Data\ComportamientoData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class ComportamientoReaderRepository
{
    private $connection;
    private $baseSQL;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getById(int $id_comportamiento): array
    {
        $comportamientos = ComportamientoData::find($id_comportamiento)->toArray();
        return (array) $comportamientos;
    }
}
