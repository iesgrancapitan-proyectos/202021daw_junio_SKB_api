<?php

namespace App\Domain\ParteConducta\Repository;

use App\Domain\ParteConducta\Data\ParteConductaData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class ParteConductaReaderRepository
{
    private $connection;
    private $baseSQL;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getByIdParte(int $id_parte): array
    {
        $partesConductas = ParteConductaData::whereRaw('partes_id = '.$id_parte)->get()->toArray();

        $resultado= [];

        foreach ($partesConductas as $valor) {
            $valor['partes_id']=ParteConductaData::find($valor['partes_id'])->parte->toArray();
            $valor['conductas_id']=ParteConductaData::find($valor['conductas_id'])->conducta->toArray();
            $resultado[] = $valor;
        }

        return (array) $resultado;
    }
}
