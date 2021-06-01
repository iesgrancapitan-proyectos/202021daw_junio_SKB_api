<?php

namespace App\Domain\Actitud\Repository;

use App\Domain\Actitud\Data\ActitudData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class ActitudReaderRepository
{
    private $connection;
    private $baseSQL;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getById(int $id_actitud): array
    {
        $actitudes = ActitudData::find($id_actitud)->toArray();
        return (array) $actitudes;
    }
}
