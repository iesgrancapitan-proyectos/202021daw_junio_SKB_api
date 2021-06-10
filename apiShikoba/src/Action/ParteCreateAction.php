<?php

namespace App\Action;

use App\Domain\Parte\Service\ParteCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ParteCreateAction
{
    private $parteCreator;

    public function __construct(ParteCreator $parteCreator)
    {
        $this->parteCreator = $parteCreator;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $data = (array)$request->getParsedBody();

        $parteId = $this->parteCreator->createParte($data);

        $result = [
            'id' => $parteId
        ];
        
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
