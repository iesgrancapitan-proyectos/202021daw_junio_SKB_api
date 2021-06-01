<?php

namespace App\Domain\Profesor\Repository;

use App\Domain\Profesor\Data\ProfesorData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;

class ProfesorReaderRepository
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getProfesorById(int $profesorId): array
    {
        $row = $this->connection->table('profesores')->find($profesorId);

        if (!$row) throw new \DomainException(sprintf('Profesor no encontrado: %s', $profesorId)); 

        return (array) $row;
    }

    public function getByEmail(string $profesorEmail): array
    {
        $row = ProfesorData::where('email','=',$profesorEmail)->first()->toArray();
    
        if (!$row) throw new \DomainException(sprintf('Profesor no encontrado: %s', $profesorEmail));

        return (array) $row;
    }

    public function getAll()
    {
        $rows = $this->connection->table('profesores')->get();
        
        return $rows;
    }
}
