<?php

namespace App\Action;

use App\Domain\Parte\Service\ParteReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ParteReadAction
{
    private $parteReader;

    public function __construct(ParteReader $parteReader)
    {
        $this->parteReader = $parteReader;
    }
    
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $parteId = (int)$args['id'];

        $result = $this->parteReader->getParteById($parteId);

        $response->getBody()->write((string)json_encode($result));
        
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
