<?php

namespace App\Action;

use App\Domain\Parte\Service\ParteReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class PartesAlumnoReadAction
{
    private $parteReader;

    public function __construct(ParteReader $parteReader)
    {
        $this->parteReader = $parteReader;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $alumnoId = (int)$args['alumnoId'];
		$fechaDesde = (string)$args['fechaDesde'];
		$fechaHasta = (string)$args['fechaHasta'];

        $result = $this->parteReader->getByAlumnoFecha($alumnoId, $fechaDesde, $fechaHasta);

        $partes = array();
        foreach($result as $objeto) {
            $partes[] = (array)$objeto;
        }

        $response->getBody()->write((string)json_encode($partes));

        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}
