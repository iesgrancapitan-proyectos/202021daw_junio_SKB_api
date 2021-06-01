<?php

namespace App\Action;

use App\Domain\Materia\Service\MateriaReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class MateriaReadAction
{
    private $materiaReader;

    public function __construct(MateriaReader $materiaReader)
    {
        $this->materiaReader = $materiaReader;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $result = $this->materiaReader->getAll();
        $response->getBody()->write((string)json_encode($result));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
