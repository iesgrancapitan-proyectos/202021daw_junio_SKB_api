<?php

namespace App\Action;

use App\Domain\ParteConducta\Service\ParteConductaReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class ParteConductaReadAction
{
    private $parteConductaReader;
    
    public function __construct(ParteConductaReader $parteConductaReader)
    {
        $this->parteConductaReader = $parteConductaReader;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $idParte = (int)$args['idParte'];

        $result = $this->parteConductaReader->getParteConductaByIdParte($idParte);

        $partesConductas = array();
        foreach ($result as $objeto) {
            $partesConductas[] = (array)$objeto;
        }

        $response->getBody()->write((string)json_encode($partesConductas));
        
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
