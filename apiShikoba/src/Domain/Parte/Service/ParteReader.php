<?php

namespace App\Domain\Parte\Service;

use App\Domain\Parte\Data\ParteData;
use App\Domain\Parte\Repository\ParteReaderRepository;
use App\Exception\ValidationException;

final class ParteReader
{
    private $repository;

    public function __construct(ParteReaderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getParteById(int $parteId): array
    {
        if (empty($parteId)) throw new ValidationException('Se requiere el ID de parte');

        $parte = $this->repository->getById($parteId);

        return $parte;
    }
    
    public function getPartesByIdProfesor(int $profesorId)
    {
        $partes = $this->repository->getByIdProfesor($profesorId);
        
        return $partes;
    }
	
	public function getByAlumnoFecha(int $alumnoId, string $fechaDesde, string $fechaHasta)
    {
        $partes = $this->repository->getByAlumnoFecha($alumnoId, $fechaDesde, $fechaHasta);
        
        return $partes;
    }
}
