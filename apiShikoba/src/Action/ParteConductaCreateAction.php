<?php

namespace App\Action;

use App\Domain\ParteConducta\Service\ParteConductaCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ParteConductaCreateAction
{
    private $parteConductaCreator;

    public function __construct(ParteConductaCreator $parteConductaCreator)
    {
        $this->parteConductaCreator = $parteConductaCreator;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $data = (array)$request->getParsedBody();

        $this->parteConductaCreator->createParteConducta($data);

        $response->getBody()->write((string)json_encode([]));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
