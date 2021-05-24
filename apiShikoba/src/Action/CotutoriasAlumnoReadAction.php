<?php

namespace App\Action;

use App\Domain\Cotutoria\Service\CotutoriaAlumnoReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class CotutoriasAlumnoReadAction
{
    /**
     * @var CotutoriaAlumnoReader
     */
    private $cotutoriaAlumnoReader;

    /**
     * The constructor.
     *
     * @param CotutoriaAlumnoReader $cotutoriaReader The user reader
     */
    public function __construct(CotutoriaAlumnoReader $cotutoriaReader)
    {
        $this->cotutoriaReader = $cotutoriaReader;
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