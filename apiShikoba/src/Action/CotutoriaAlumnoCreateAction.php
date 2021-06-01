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
        $data = (array)$request->getParsedBody();

        $cotutoriaAlumnoId = $this->cotutoriaAlumnoCreator->createCotutoriaAlumno($data);

        $result = [
            'id' => $cotutoriaAlumnoId
        ];
		
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
