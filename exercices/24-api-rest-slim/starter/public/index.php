<?php

declare(strict_types=1);

use App\Database;
use App\Http\JsonResponse;
use App\Repository\FilmRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require dirname(__DIR__) . '/vendor/autoload.php';

$repository = new FilmRepository(Database::creer(dirname(__DIR__) . '/data/api.sqlite'));
$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/api/films', static function (Request $request, Response $response) use ($repository): Response {
    $query = $request->getQueryParams();
    $q = isset($query['q']) ? trim((string) $query['q']) : null;
    // TODO : valider page et limite puis calculer l'offset.
    $films = $repository->tous($q);
    return JsonResponse::creer($response, ['data' => $films, 'meta' => ['nombre' => count($films)]]);
});

$app->get('/api/films/{id}', static function (Request $request, Response $response, array $args) use ($repository): Response {
    $id = filter_var($args['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if ($id === false) {
        return JsonResponse::erreur($response, 'IDENTIFIANT_INVALIDE', "L'identifiant doit être un entier positif.", 400);
    }
    $film = $repository->trouver($id);
    if ($film === null) {
        return JsonResponse::erreur($response, 'FILM_INTROUVABLE', 'Aucun film ne correspond à cet identifiant.', 404);
    }
    return JsonResponse::creer($response, ['data' => $film]);
});

$app->post('/api/films', static function (Request $request, Response $response) use ($repository): Response {
    // TODO : valider, créer, relire, ajouter Location et répondre 201.
    return JsonResponse::erreur($response, 'NON_IMPLEMENTE', 'Endpoint à compléter.', 501);
});

$app->patch('/api/films/{id}', static function (Request $request, Response $response, array $args) use ($repository): Response {
    // TODO : valider l'identifiant, l'existence et uniquement les propriétés présentes.
    return JsonResponse::erreur($response, 'NON_IMPLEMENTE', 'Endpoint à compléter.', 501);
});

$app->delete('/api/films/{id}', static function (Request $request, Response $response, array $args) use ($repository): Response {
    // TODO : répondre 204 sans corps après suppression.
    return JsonResponse::erreur($response, 'NON_IMPLEMENTE', 'Endpoint à compléter.', 501);
});

$app->run();
