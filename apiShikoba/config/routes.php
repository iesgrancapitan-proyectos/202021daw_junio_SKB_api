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
    $app->get('/partesAlumnoFecha/{alumnoId}/{fechaDesde}/{fechaHasta}', \App\Action\PartesAlumnoReadAction::class)->setName('partes-alumno-fecha');
    $app->options('/busqueda/{alumnoId}/{fechaDesde}/{fechaHasta}', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Cotutorías por alumno y fecha
    $app->get('/cotutoriasAlumnoFecha/{alumnoId}/{fecha}', \App\Action\CotutoriasAlumnoReadAction::class)->setName('cotutorias-alumno-fecha');
    $app->options('/busqueda/{alumnoId}/{fecha}', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Todos los alumnos
    $app->get('/alumnos', \App\Action\AlumnosReadAction::class)->setName('todos-alumnos');
    $app->options('/alumnos', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Todas las conductas
    $app->get('/conductas', \App\Action\ConductaReadAction::class)->setName('conductas');
    $app->options('/conductas', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Conducta por ID
    $app->get('/conducta/{idConducta}', \App\Action\ConductaIdReadAction::class)->setName('conducta-id');
    $app->options('/conducta/{idConducta}', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Conductas por ID de parte
    $app->get('/parteConducta/{idParte}', \App\Action\ParteConductaReadAction::class)->setName('parte-conductas');
    $app->options('/parteConducta/{idParte}', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Añadir un parte-conducta
    $app->post('/crearParteConducta', \App\Action\ParteConductaCreateAction::class)->setName('parte-conducta-post');

    // Añadir un parte
    $app->post('/crearParte', \App\Action\ParteCreateAction::class)->setName('parte-post');

    // Añadir un parte-sancion
    $app->post('/crearParteSancion', \App\Action\ParteSancionCreateAction::class)->setName('parte-sancion-post');

    // Añadir una sanción
    $app->post('/crearSancion', \App\Action\SancionCreateAction::class)->setName('sancion-post');

    // Obtener cursos
    $app->get('/cursos', \App\Action\CursoReadAction::class)->setName('curso-get');
    $app->options('/cursos', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });

    // Obtener curso por ID
    $app->get('/curso/{idCurso}', \App\Action\CursoIdReadAction::class)->setName('curso-id-get');
    $app->options('/curso/{idCurso}', function (ServerRequestInterface $request, ResponseInterface $response): ResponseInterface {
        return $response;
    });
};
