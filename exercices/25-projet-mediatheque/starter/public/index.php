<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require dirname(__DIR__) . '/vendor/autoload.php';

$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/', static function (Request $request, Response $response): Response {
    $response->getBody()->write('<h1>Médiathèque</h1><p>Le socle fonctionne. Construisez maintenant le projet.</p>');
    return $response->withHeader('Content-Type', 'text/html; charset=utf-8');
});

$app->get('/api/status', static function (Request $request, Response $response): Response {
    $response->getBody()->write('{"status":"ok"}');
    return $response->withHeader('Content-Type', 'application/json; charset=utf-8');
});

// TODO : construire les dépendances, déclarer les routes HTML et les routes API.

$app->run();
