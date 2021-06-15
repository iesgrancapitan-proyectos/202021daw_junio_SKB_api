<?php

namespace App\Action;

use App\Domain\Sancion\Service\SancionCreator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class SancionCreateAction
{
    private $sancionCreator;

    public function __construct(ParteCreator $sancionCreator)
    {
        $this->sancionCreator = $sancionCreator;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $data = (array)$request->getParsedBody();

        $sancionId = $this->sancionCreator->createSancion($data);

        $result = [
            'id' => $sancionId
        ];
        
        $response->getBody()->write((string)json_encode($result));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}
