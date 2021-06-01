<?php

namespace App\Action;

use App\Domain\CotutoriaAlumno\Service\CotutoriaAlumnoReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CotutoriasAlumnoReadAction
{
    private $cotutoriaAlumnoReader;

    public function __construct(CotutoriaAlumnoReader $cotutoriaReader)
    {
        $this->cotutoriaAlumnoReader = $cotutoriaReader;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $alumnoId = (int)$args['alumnoId'];
		$fecha = (string)$args['fecha'];

        $result = $this->cotutoriaAlumnoReader->getByAlumnoFecha($alumnoId, $fecha);

        $cotutorias = array();
        foreach($result as $objeto) {
            $cotutorias[] = (array)$objeto;
        }

        $response->getBody()->write((string)json_encode($cotutorias));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
