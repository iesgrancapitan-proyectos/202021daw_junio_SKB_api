<?php

namespace App\Action;

use App\Domain\Cotutoria\Service\CotutoriaReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class CotutoriasProfesorReadAction
{
    private $cotutoriaReader;

    public function __construct(CotutoriaReader $cotutoriaReader)
    {
        $this->cotutoriaReader = $cotutoriaReader;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $profesorId = (int)$args['id'];

        $idprofesor = $request->getAttribute('profesorId');

        $result = $this->cotutoriaReader->getCotutoriasByIdProfesor($profesorId);

        $cotutorias = array();
        foreach ($result as $objeto) {
            $cotutorias[] = (array)$objeto;
        }

        $response->getBody()->write((string)json_encode($cotutorias));
        
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
