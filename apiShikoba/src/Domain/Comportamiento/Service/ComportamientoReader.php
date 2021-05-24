<?php

namespace App\Domain\Comportamiento\Service;

use App\Domain\Comportamiento\Data\ComportamientoData;
use App\Domain\Comportamiento\Repository\ComportamientoReaderRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class ComportamientoReader
{
    /**
     * @var ComportamientoReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param ComportamientoReaderRepository $repository The repository
     */
    public function __construct(ComportamientoReaderRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Obtener comportamiento por ID
     */
    public function getComportamientoById(int $id_comportamiento)
    {
        $comportamientos = $this->repository->getById($id_comportamiento);
        return $comportamientos;
    }
}