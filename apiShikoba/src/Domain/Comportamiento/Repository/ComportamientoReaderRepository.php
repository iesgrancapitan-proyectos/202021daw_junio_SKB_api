<?php

namespace App\Domain\Comportamiento\Repository;

use App\Domain\Comportamiento\Data\ComportamientoData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class ComportamientoReaderRepository
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
     * Comportamiento
     *
     * @param int $id_comportamiento ID Comportamiento
     *
     * @return array Array con el comportamiento
     */
    public function getById(int $id_comportamiento): array
    {
        $comportamientos = ComportamientoData::find($id_comportamiento)->toArray();
        return (array) $comportamientos;
    }
}