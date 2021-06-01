<?php

namespace App\Action;

use App\Domain\Cotutoria\Service\CotutoriaReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CotutoriaReadAction
{
    private $cotutoriaReader;

    public function __construct(CotutoriaReader $cotutoriaReader)
    {
        $this->cotutoriaReader = $cotutoriaReader;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $result = $this->cotutoriaReader->getAll();
        $response->getBody()->write((string)json_encode($result));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
