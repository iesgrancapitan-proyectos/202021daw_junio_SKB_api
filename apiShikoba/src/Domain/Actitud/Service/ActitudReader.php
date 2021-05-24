<?php

namespace App\Domain\Actitud\Service;

use App\Domain\Actitud\Data\ActitudData;
use App\Domain\Actitud\Repository\ActitudReaderRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class ActitudReader
{
    /**
     * @var ActitudReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param ActitudReaderRepository $repository The repository
     */
    public function __construct(ActitudReaderRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Obtener actitud por ID
     */
    public function getActitudById(int $id_actitud)
    {
        $actitudes = $this->repository->getById($id_actitud);
        return $actitudes;
    }
}