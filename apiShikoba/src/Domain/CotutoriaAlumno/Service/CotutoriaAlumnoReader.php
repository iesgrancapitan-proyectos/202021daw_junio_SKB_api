<?php

namespace App\Domain\CotutoriaAlumno\Service;

use App\Domain\CotutoriaAlumno\Data\CotutoriaAlumnoData;
use App\Domain\CotutoriaAlumno\Repository\CotutoriaAlumnoReaderRepository;
use App\Exception\ValidationException;

/**
 * Service.
 */
final class CotutoriaAlumnoReader
{
    /**
     * @var CotutoriaAlumnoReaderRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param CotutoriaAlumnoReaderRepository $repository The repository
     */
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