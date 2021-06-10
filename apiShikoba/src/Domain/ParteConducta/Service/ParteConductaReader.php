<?php

namespace App\Domain\ParteConducta\Service;

use App\Domain\ParteConducta\Repository\ParteConductaReaderRepository;

final class ParteConductaReader
{
    private $repository;

    public function __construct(ParteConductaReaderRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getParteConductaByIdParte(int $id_parte)
    {
        $partesConductas = $this->repository->getByIdParte($id_parte);
        
        return $partesConductas;
    }
}
