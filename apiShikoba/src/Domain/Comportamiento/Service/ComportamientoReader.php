<?php

namespace App\Domain\Comportamiento\Service;

use App\Domain\Comportamiento\Data\ComportamientoData;
use App\Domain\Comportamiento\Repository\ComportamientoReaderRepository;
use App\Exception\ValidationException;

final class ComportamientoReader
{
    private $repository;

    public function __construct(ComportamientoReaderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getComportamientoById(int $id_comportamiento)
    {
        $comportamientos = $this->repository->getById($id_comportamiento);
        return $comportamientos;
    }
}
