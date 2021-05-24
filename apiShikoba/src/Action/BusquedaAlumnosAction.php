<?php

namespace App\Action;

use App\Domain\Alumno\Service\AlumnoReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class BusquedaAlumnosAction
{
    /**
     * @var ProfesorReader
     */
    private $alumnoReader;

    /**
     * The constructor.
     *
     * @param ProfesorReader $userReader The user reader
     */
    public function __construct(AlumnoReader $alumnoReader)
    {
        $this->alumnoReader = $alumnoReader;
    }

    /**
     * Invoke.
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     * @param array $args The route arguments
     *
     * @return ResponseInterface The response
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        // Collect input from the HTTP request
        $busqueda = $args['busqueda'];

        // Invoke the Domain with inputs and retain the result
        $result = $this->alumnoReader->busqueda($busqueda);
		
		$alumnos = array();
        foreach($result as $objeto) {
            $alumnos[] = (array)$objeto;
        }

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($alumnos));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}