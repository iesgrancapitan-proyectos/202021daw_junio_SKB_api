<?php

namespace App\Action;

use App\Domain\Profesor\Service\ProfesorReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ProfesorEmailReadAction
{
    private $profesorReader;

    public function __construct(ProfesorReader $profesorReader)
    {
        $this->profesorReader = $profesorReader;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $profesorEmail = $args['email'];

        $result = $this->profesorReader->getProfesorByEmail($profesorEmail);

        $response->getBody()->write((string)json_encode($result));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
