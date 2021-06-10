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
    
    public function getConductaById(int $id_conducta)
    {
        $conducta = $this->repository->getById($id_conducta);
        
        return $conducta;
    }

    public function getAllConductas()
    {
        $conductas = $this->repository->getAllConductas();
        
        return $conductas;
    }
}
