<?php

namespace App\Domain\Materia\Service;

use App\Domain\Materia\Data\MateriaData;
use App\Domain\Materia\Repository\MateriaReaderRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class MateriaReader
{
    /**
     * @var MateriaReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param MateriaReaderRepository $repository The repository
     */
    public function __construct(MateriaReaderRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getMateriasById(int $id_materia)
    {
        $materias = $this->repository->getById($id_materia);
        
        return $materias;
    }

    public function getAll()
    {
        $materias = $this->repository->getAll();
        
        return $materias;
    }
}