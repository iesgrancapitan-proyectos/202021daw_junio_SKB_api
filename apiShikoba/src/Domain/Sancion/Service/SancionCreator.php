<?php

namespace App\Domain\Sancion\Service;

use App\Domain\Sancion\Repository\SancionCreatorRepository;

final class SancionCreator
{
    private $repository;

    public function __construct(SancionCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createSancion(array $data): int
    {
        $sancionId = $this->repository->insertSancion($data);

        return $sancionId;
    }
}
