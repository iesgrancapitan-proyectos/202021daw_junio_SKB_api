<?php

namespace App\Domain\Cotutoria\Service;

use App\Domain\Cotutoria\Data\CotutoriaData;
use App\Domain\Cotutoria\Repository\CotutoriaReaderRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class CotutoriaReader
{
    /**
     * @var CotutoriaReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param CotutoriaReaderRepository $repository The repository
     */
    public function __construct(CotutoriaReaderRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getCotutoriasByIdProfesor(int $id_profesor)
    {
        $cotutorias = $this->repository->getByIdProfesor($id_profesor);
        
        return $cotutorias;
    }

    public function getAll()
    {
        $cotutorias = $this->repository->getAll();
        
        return $cotutorias;
    }
}