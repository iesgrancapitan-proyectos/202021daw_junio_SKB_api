<?php

namespace App\Domain\CotutoriaAlumno\Service;

use App\Domain\CotutoriaAlumno\Data\CotutoriaAlumnoData;
use App\Domain\CotutoriaAlumno\Repository\CotutoriaAlumnoReaderRepository;
use App\Exception\ValidationException;

final class CotutoriaAlumnoReader
{
    private $repository;

    public function __construct(CotutoriaAlumnoReaderRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getByAlumnoFecha(int $idAlumno, string $fecha)
    {
        $cotutorias = $this->repository->getByAlumnoFecha($idAlumno, $fecha);
        
        return $cotutorias;
    }
    
    public function getCotutoriaAlumnoByIdAlumno(int $id_alumno)
    {
        $cotutoriasAlumno = $this->repository->getByIdAlumno($id_alumno);
        
        return $cotutoriasAlumno;
    }
}
