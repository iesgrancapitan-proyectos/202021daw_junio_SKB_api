<?php

namespace App\Action;

use App\Domain\Cotutoria\Service\CotutoriaReader;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Action
 */
final class CotutoriaReadAction
{
    /**
     * @var CotutoriaReader
     */
    private $cotutoriaReader;

    /**
     * The constructor.
     *
     * @param CotutoriaReader $userReader The user reader
     */
    public function __construct(CotutoriaReader $cotutoriaReader)
    {
        $this->cotutoriaReader = $cotutoriaReader;
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
        $result = $this->cotutoriaReader->getAll();
        $response->getBody()->write((string)json_encode($result));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}