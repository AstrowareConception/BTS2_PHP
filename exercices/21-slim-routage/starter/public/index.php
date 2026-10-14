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

$json = static function (Response $response, array $donnees, int $statut = 200): Response {
    $response->getBody()->write((string) json_encode($donnees, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR));

    return $response
        ->withHeader('Content-Type', 'application/json; charset=utf-8')
        ->withStatus($statut);
};

$app->get('/', static function (Request $request, Response $response): Response {
    $response->getBody()->write('Slim fonctionne. À vous de compléter les routes.');

    return $response;
});

$app->get('/bonjour/{nom}', static function (Request $request, Response $response, array $args): Response {
    // TODO : valider puis utiliser $args['nom'].
    return $response->withStatus(501);
});

$app->get('/addition/{a}/{b}', static function (Request $request, Response $response, array $args) use ($json): Response {
    // TODO : refuser les valeurs qui ne représentent pas deux entiers.
    return $json($response, ['erreur' => 'Route à implémenter'], 501);
});

$app->get('/films/{id}', static function (Request $request, Response $response, array $args) use ($json): Response {
    // TODO : l'identifiant doit être un entier strictement positif.
    return $json($response, ['erreur' => 'Route à implémenter'], 501);
});

$app->get('/recherche', static function (Request $request, Response $response) use ($json): Response {
    // Indice : $request->getQueryParams().
    return $json($response, ['erreur' => 'Route à implémenter'], 501);
});

$app->post('/miroir', static function (Request $request, Response $response) use ($json): Response {
    // Indice : $request->getParsedBody().
    return $json($response, ['erreur' => 'Route à implémenter'], 501);
});

$app->run();
