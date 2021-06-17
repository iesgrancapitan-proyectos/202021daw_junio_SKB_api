<?php

namespace App\Domain\Curso\Service;

use App\Domain\Curso\Data\CursoData;
use App\Domain\Curso\Repository\CursoReaderRepository;
use App\Exception\ValidationException;

final class CursoReader
{
    private $repository;

    public function __construct(CursoReaderRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function getCursosById(int $id_curso)
    {
        $cursos = $this->repository->getById($id_curso);
        
        return $cursos;
    }

    public function getAll()
    {
        $cursos = $this->repository->getAll();
        
        return $cursos;
    }
}
