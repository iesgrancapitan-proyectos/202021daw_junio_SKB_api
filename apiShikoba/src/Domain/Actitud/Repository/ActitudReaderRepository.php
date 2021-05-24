<?php

namespace App\Domain\Actitud\Repository;

use App\Domain\Actitud\Data\ActitudData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class ActitudReaderRepository
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
     * Actitud
     *
     * @param int $id_actitud ID Actitud
     *
     * @return array Array con la actitud
     */
    public function getById(int $id_actitud): array
    {
        $actitudes = ActitudData::find($id_actitud)->toArray();
        return (array) $actitudes;
    }
}