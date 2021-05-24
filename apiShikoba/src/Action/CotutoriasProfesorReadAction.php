<?php

namespace App\Action;

use App\Domain\Cotutoria\Service\CotutoriaReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class CotutoriasProfesorReadAction
{
    /**
     * @var CotutoriaReader
     */
    private $cotutoriaReader;

    /**
     * The constructor.
     *
     * @param CotutoriaReader $cotutoriasReader The user reader
     */
    public function __construct(CotutoriaReader $cotutoriaReader)
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
        $profesorId = (int)$args['id'];

        // Invoke the Domain with inputs and retain the result
        $idprofesor = $request->getAttribute('profesorId');

        $result = $this->cotutoriaReader->getCotutoriasByIdProfesor($profesorId);

        $cotutorias = array();
        foreach ($result as $objeto) {
            $cotutorias[] = (array)$objeto;
        }

        $response->getBody()->write((string)json_encode($cotutorias));
        
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}