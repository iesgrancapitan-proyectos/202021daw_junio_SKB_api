<?php

namespace App\Action;

use App\Domain\CotutoriaAlumno\Service\CotutoriaAlumnoReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CotutoriaAlumnoReadAction
{
    private $cotutoriaAlumnoReader;
	
    public function __construct(CotutoriaAlumnoReader $cotutoriaAlumnoReader)
    {
        $this->cotutoriaAlumnoReader = $cotutoriaAlumnoReader;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $alumnoId = (int)$args['id'];

        $idalumno = $request->getAttribute('alumnoId');

        $result = $this->cotutoriaAlumnoReader->getCotutoriaAlumnoByIdAlumno($alumnoId);

        $cotutoriasAlumno = array();
        foreach ($result as $objeto) {
            $cotutoriasAlumno[] = (array)$objeto;
        }

        $response->getBody()->write((string)json_encode($cotutoriasAlumno));
        
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
