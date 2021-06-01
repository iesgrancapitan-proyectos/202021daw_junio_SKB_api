<?php

namespace App\Domain\Profesor\Service;

use App\Domain\Profesor\Data\ProfesorData;
use App\Domain\Profesor\Repository\ProfesorReaderRepository;
use App\Exception\ValidationException;

final class ProfesorReader
{
    private $repository;

    public function __construct(ProfesorReaderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getProfesorDetails(int $profesorId): array
    {
        if (empty($profesorId)) throw new ValidationException('Se requiere el ID de profesor');

        $profesor = $this->repository->getProfesorById($profesorId);
      
        return $profesor;
    }
    
    public function getProfesorByEmail(string $profesorEmail): array
    {
        if (empty($profesorEmail)) throw new ValidationException('Se requiere el email de profesor');

        $profesor = $this->repository->getByEmail($profesorEmail);

        return (array) $profesor;
    }

    public function getAllProfesores()
    {
        $profesores = $this->repository->getAll();

        return $profesores;
    }
}
