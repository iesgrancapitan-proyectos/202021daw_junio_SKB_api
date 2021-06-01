<?php

namespace App\Action;

use App\Domain\Parte\Service\ParteReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class PartesProfesorReadAction
{
    private $parteReader;

    public function __construct(ParteReader $parteReader)
    {
        $this->parteReader = $parteReader;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $profesorId = (int)$args['id'];

        $idprofesor = $request->getAttribute('profesorId');

        $result = $this->parteReader->getPartesByIdProfesor($profesorId);

        $partes = array();
        foreach($result as $objeto) {
            $partes[] = (array)$objeto;
        }

        $response->getBody()->write((string)json_encode($partes));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
