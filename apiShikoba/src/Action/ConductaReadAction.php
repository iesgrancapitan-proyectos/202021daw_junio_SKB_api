<?php

namespace App\Action;

use App\Domain\Conducta\Service\ConductaReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ConductaReadAction
{
    private $conductaReader;

    public function __construct(ConductaReader $conductaReader)
    {
        $this->conductaReader = $conductaReader;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $result = $this->conductaReader->getAllConductas();
        
        $conductas = array();
        foreach($result as $objeto) {
            $conductas[] = (array)$objeto;
        }
        
        $response->getBody()->write((string)json_encode($conductas));
        
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
