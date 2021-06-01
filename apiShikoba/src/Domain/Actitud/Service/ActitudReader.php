<?php

namespace App\Domain\Actitud\Service;

use App\Domain\Actitud\Data\ActitudData;
use App\Domain\Actitud\Repository\ActitudReaderRepository;
use App\Exception\ValidationException;

final class ActitudReader
{
    private $repository;

    public function __construct(ActitudReaderRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getActitudById(int $id_actitud)
    {
        $actitudes = $this->repository->getById($id_actitud);
        return $actitudes;
    }
}
