<?php

namespace App\Domain\Parte\Service;

use App\Domain\Parte\Repository\ParteCreatorRepository;

final class ParteCreator
{
    private $repository;

    public function __construct(ParteCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createParte(array $data): int
    {
        $parteId = $this->repository->insertParte($data);

        return $parteId;
    }
}
