<?php

namespace App\Domain\ParteSancion\Service;

use App\Domain\ParteSancion\Repository\ParteSancionCreatorRepository;
use App\Exception\ValidationException;

final class ParteSancionCreator
{
    private $repository;

    public function __construct(ParteSancionCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createParteSancion(array $data): int
    {
        $this->repository->insertParteSancion($data);
    }
}
