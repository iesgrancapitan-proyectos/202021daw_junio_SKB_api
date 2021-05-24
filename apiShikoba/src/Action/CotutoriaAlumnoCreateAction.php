<?php

namespace App\Action;

use App\Domain\CotutoriaAlumno\Service\CotutoriaAlumnoCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CotutoriaAlumnoCreateAction
{
    private $cotutoriaAlumnoCreator;

    public function __construct(CotutoriaAlumnoCreator $cotutoriaAlumnoCreator)
    {
        $this->cotutoriaAlumnoCreator = $cotutoriaAlumnoCreator;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        // Collect input from the HTTP request
        $data = (array)$request->getParsedBody();

        // Invoke the Domain with inputs and retain the result
        $cotutoriaAlumnoId = $this->cotutoriaAlumnoCreator->createCotutoriaAlumno($data);

        // Transform the result into the JSON representation
        $result = [
            'id' => $cotutoriaAlumnoId
        ];

        // Build the HTTP response
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}