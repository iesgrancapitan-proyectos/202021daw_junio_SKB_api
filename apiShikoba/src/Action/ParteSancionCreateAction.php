<?php

namespace App\Action;

use App\Domain\ParteSancion\Service\ParteSancionCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ParteSancionCreateAction
{
    private $parteSancionCreator;

    public function __construct(ParteSancionCreator $parteSancionCreator)
    {
        $this->parteSancionCreator = $parteSancionCreator;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $data = (array)$request->getParsedBody();

        $this->parteSancionCreator->createParteSancion($data);

        $response->getBody()->write((string)json_encode([]));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
