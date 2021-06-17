<?php

namespace App\Action;

use App\Domain\Curso\Service\CursoReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CursoIdReadAction
{
    private $cursoReader;

    public function __construct(CursoReader $cursoReader)
    {
        $this->cursoReader = $cursoReader;
    }
    
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $idCurso = (int)$args['idCurso'];

        $result = $this->cursoReader->getCursosById($idCurso);

        $response->getBody()->write((string)json_encode($result));
        
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
