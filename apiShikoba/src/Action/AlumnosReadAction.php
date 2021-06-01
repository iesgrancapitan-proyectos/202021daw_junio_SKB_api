<?php

namespace App\Action;

use App\Domain\Alumno\Service\AlumnoReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AlumnosReadAction
{
    private $alumnoReader;

    public function __construct(AlumnoReader $alumnoReader)
    {
        $this->alumnoReader = $alumnoReader;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $result = $this->alumnoReader->getAllAlumnos();
		
		$alumnos = array();
        foreach($result as $objeto) {
            $alumnos[] = (array)$objeto;
        }
		
        $response->getBody()->write((string)json_encode($alumnos));
		
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
