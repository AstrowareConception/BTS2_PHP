<?php

declare(strict_types=1);

use App\Database;
use App\Repository\FilmRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require dirname(__DIR__) . '/vendor/autoload.php';

$database = Database::creer(dirname(__DIR__) . '/data/catalogue.sqlite');
$films = new FilmRepository($database);
$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/', static function (Request $request, Response $response): Response {
    $response->getBody()->write('<h1>Catalogue</h1><p>Commencez par <code>GET /films</code>.</p>');
    return $response->withHeader('Content-Type', 'text/html; charset=utf-8');
});

$app->get('/films', static function (Request $request, Response $response) use ($films): Response {
    // TODO : lire q, interroger le repository et produire la liste HTML.
    $response->getBody()->write('<h1>Route à implémenter</h1>');
    return $response->withStatus(501)->withHeader('Content-Type', 'text/html; charset=utf-8');
});

$app->get('/films/{id}', static function (Request $request, Response $response, array $args) use ($films): Response {
    // TODO : distinguer identifiant invalide (400) et film absent (404).
    $response->getBody()->write('<h1>Route à implémenter</h1>');
    return $response->withStatus(501)->withHeader('Content-Type', 'text/html; charset=utf-8');
});

$app->post('/films', static function (Request $request, Response $response) use ($films): Response {
    // TODO : valider le formulaire, insérer puis rediriger en 303.
    $response->getBody()->write('<h1>Route à implémenter</h1>');
    return $response->withStatus(501)->withHeader('Content-Type', 'text/html; charset=utf-8');
});

$app->run();
