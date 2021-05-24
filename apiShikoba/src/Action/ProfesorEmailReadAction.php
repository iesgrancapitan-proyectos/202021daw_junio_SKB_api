<?php

namespace App\Action;

use App\Domain\Profesor\Service\ProfesorReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class ProfesorEmailReadAction
{
    /**
     * @var ProfesorReader
     */
    private $profesorReader;

    /**
     * The constructor.
     *
     * @param ProfesorReader $userReader The user reader
     */
    public function __construct(ProfesorReader $profesorReader)
    {
        $this->profesorReader = $profesorReader;
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
        $profesorEmail = $args['email'];

        // Invoke the Domain with inputs and retain the result
        $result = $this->profesorReader->getProfesorByEmail($profesorEmail);

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}