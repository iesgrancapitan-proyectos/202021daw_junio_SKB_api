<?php

namespace App\Domain\Conducta\Service;

use App\Domain\Conducta\Data\ConductaData;
use App\Domain\Conducta\Repository\ConductaReaderRepository;
use App\Exception\ValidationException;

final class ConductaReader
{
    private $repository;

    public function __construct(ConductaReaderRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getConductasById(int $id_conducta)
    {
        $conductas = $this->repository->getById($id_conducta);
        
        return $conductas;
    }

    public function getAllConductas()
    {
        $conductas = $this->repository->getAllConductas();
        
        return $conductas;
    }
}
