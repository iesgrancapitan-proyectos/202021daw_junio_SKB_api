<?php

namespace App\Action;

use App\Domain\Conducta\Service\ConductaReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ConductaIdReadAction
{
    private $conductaReader;

    public function __construct(ConductaReader $conductaReader)
    {
        $this->conductaReader = $conductaReader;
    }
    
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $idConducta = (int)$args['idConducta'];

        $result = $this->conductaReader->getConductaById($idConducta);

        $response->getBody()->write((string)json_encode($result));
        
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
