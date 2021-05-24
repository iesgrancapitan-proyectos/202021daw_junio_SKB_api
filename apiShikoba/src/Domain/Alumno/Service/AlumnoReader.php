<?php

namespace App\Domain\Alumno\Service;

use App\Domain\Alumno\Data\AlumnoData;
use App\Domain\Alumno\Repository\AlumnoReaderRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class AlumnoReader
{
    /**
     * @var AlumnoReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param AlumnoReaderRepository $repository The repository
     */
    public function __construct(AlumnoReaderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAlumnoDetails(int $alumnoId): array
    {
        if (empty($alumnoId)) throw new ValidationException('Se requiere el ID de alumno');

        $alumno = $this->repository->getAlumnoById($alumnoId);

        return $alumno;
    }
	
	public function busqueda($busqueda): array
    {
        if (empty($busqueda)) throw new ValidationException('Se requiere un parámetro de búsqueda');

        $resultado = $this->repository->busqueda($busqueda);

        return $resultado;
    }
    
    public function getAllAlumnos()
    {
        $alumnos = $this->repository->getAll();

        return $alumnos;
    }
}