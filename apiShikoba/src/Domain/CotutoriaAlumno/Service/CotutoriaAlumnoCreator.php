<?php

namespace App\Domain\CotutoriaAlumno\Service;

use App\Domain\CotutoriaAlumno\Repository\CotutoriaAlumnoCreatorRepository;
use App\Exception\ValidationException;

final class CotutoriaAlumnoCreator
{
    private $repository;

    public function __construct(CotutoriaAlumnoCreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createCotutoriaAlumno(array $data): int
    {
        $cotutoriaId = $this->repository->insertCotutoriaAlumno($data);

        return $cotutoriaId;
    }
}
