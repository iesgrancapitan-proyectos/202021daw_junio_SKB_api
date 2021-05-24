<?php

namespace App\Action;

use App\Domain\Materia\Service\MateriaReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class MateriaReadAction
{
    /**
     * @var MateriaReader
     */
    private $materiaReader;

    /**
     * The constructor.
     *
     * @param MateriaReader $userReader The user reader
     */
    public function __construct(MateriaReader $materiaReader)
    {
        $this->materiaReader = $materiaReader;
    }

    /**
     * Invoke.
     *
     * @param ServerRequestInterface $request The request
     * @param ResponseInterface $response The response
     * @param array $args The route arguments
     *
     * @return ResponseInterface The response
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $result = $this->materiaReader->getAll();
        $response->getBody()->write((string)json_encode($result));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}