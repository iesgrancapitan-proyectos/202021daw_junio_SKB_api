<?php

namespace App\Domain\Materia\Repository;

use App\Domain\Materia\Data\MateriaData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class MateriaReaderRepository
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
     * Materias
     *
     * @param int $id_materia The user
     *
     * @return array array con la materias
     */
    public function getById(int $id_materia): array
    {
        // Cargamos las cotutorias del profesor
        $materias = MateriaData::where('id','=',$id_materia)->get()->toArray();

        return (array) $materias;
    }

    public function getAll()
    {
        $materias = MateriaData::all()->toArray();
        return (array) $materias;
    }
}