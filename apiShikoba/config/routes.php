<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotFoundException;
use Slim\App;

return function (App $app)
{
    // Ruta de prueba
    $app->get('/', \App\Action\HomeAction::class)->setName('home');
    $app->options('/', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Obtener un profesor por ID
    $app->get('/profesores/id/{id}', \App\Action\ProfesorIdReadAction::class)->setName('profesores-id-get');

    // Obtener un profesor por email
    $app->get('/profesores/email/{email}', \App\Action\ProfesorEmailReadAction::class)->setName('profesores-email-get');

    // Obtener los partes de un profesor
    $app->get('/profesores/{id}/partes', \App\Action\PartesProfesorReadAction::class)->setName('partes-profesor-get');
    $app->options('/profesores/{id}/partes', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Obtener los alumnos cotutelados por un profesor
    $app->get('/profesores/{id}/cotutorias', \App\Action\CotutoriasProfesorReadAction::class)->setName('cotutorias-profesor-get');
    $app->options('/profesores/{id}/cotutorias', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Obtener los registros de cotutoría de un alumno
    $app->get('/alumnos/{id}/cotutorias', \App\Action\CotutoriaAlumnoReadAction::class)->setName('cotutoria-alumno-get');
    $app->options('/alumnos/{id}/cotutorias', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Obtener cotutorías
    $app->get('/cotutorias', \App\Action\CotutoriaReadAction::class)->setName('cotutorias-get');
    $app->options('/cotutorias', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Añadir un registro de cotutoría
    $app->post('/cotutorias/crear', \App\Action\CotutoriaAlumnoCreateAction::class)->setName('cotutoria-alumno-post');

    // Obtener partes
    $app->get('/partes/{id}', \App\Action\ParteReadAction::class)->setName('partes-get');
    $app->options('/partes/{id}', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Obtener materias
    $app->get('/materias', \App\Action\MateriaReadAction::class)->setName('materias-get');
    $app->options('/materias', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });
	
	// Búsqueda alumnos
    $app->get('/busqueda/{busqueda}', \App\Action\BusquedaAlumnosAction::class)->setName('busqueda');
    $app->options('/busqueda/{busqueda}', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });
	
	// Partes por alumno y rango de fechas
    $app->get('/partesAlumnoFecha/{idAlumno}/{fechaDesde}/{fechaHasta}', \App\Action\PartesAlumnoReadAction::class)->setName('partes-alumno-fecha');
    $app->options('/busqueda/{idAlumno}/{fechaDesde}/{fechaHasta}', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Cotutorías por alumno y fecha
    $app->get('/cotutoriasAlumnoFecha/{idAlumno}/{fecha}', \App\Action\CotutoriasAlumnoReadAction::class)->setName('cotutorias-alumno-fecha');
    $app->options('/busqueda/{idAlumno}/{fecha}', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });
};
