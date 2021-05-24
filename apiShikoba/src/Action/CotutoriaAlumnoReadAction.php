<?php

namespace App\Action;

use App\Domain\CotutoriaAlumno\Service\CotutoriaAlumnoReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class CotutoriaAlumnoReadAction
{
    /**
     * @var CotutoriaAlumnoReader
     */
    private $cotutoriaAlumnoReader;

    /**
     * The constructor.
     *
     * @param CotutoriaAlumnoReader $cotutoriaAlumnoReader The user reader
     */
    public function __construct(CotutoriaAlumnoReader $cotutoriaAlumnoReader)
    {
        $this->cotutoriaAlumnoReader = $cotutoriaAlumnoReader;
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
        $alumnoId = (int)$args['id'];

        // Invoke the Domain with inputs and retain the result
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