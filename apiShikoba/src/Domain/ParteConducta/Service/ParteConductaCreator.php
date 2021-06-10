<?php

namespace App\Domain\ParteConducta\Service;

use App\Domain\ParteConducta\Repository\ParteConductaCreatorRepository;
use App\Exception\ValidationException;

final class ParteConductaCreator
{
    private $repository;

    public function __construct(ParteConductaCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createParteConducta(array $data): int
    {
        $this->repository->insertParteConducta($data);
    }
}
