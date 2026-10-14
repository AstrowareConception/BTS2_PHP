<?php

declare(strict_types=1);

use Medoo\Medoo;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require dirname(__DIR__) . '/vendor/autoload.php';

// Ce fichier fonctionne mais mélange volontairement toutes les responsabilités.
$db = new Medoo(['type' => 'sqlite', 'database' => dirname(__DIR__) . '/data/catalogue.sqlite']);
$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$e = static fn (mixed $valeur): string => htmlspecialchars((string) $valeur, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

$app->get('/films', static function (Request $request, Response $response) use ($db, $e): Response {
    $lignes = $db->select('film', ['id', 'titre', 'annee', 'note'], ['ORDER' => ['titre' => 'ASC']]);
    $html = '<!doctype html><html lang="fr"><meta charset="utf-8"><title>Films</title><body>';
    $html .= '<h1>Films</h1><p><a href="/films/nouveau">Ajouter un film</a></p><ul>';
    foreach ($lignes as $film) {
        $html .= '<li><a href="/films/' . (int) $film['id'] . '">' . $e($film['titre']) . '</a>';
        $html .= ' — ' . (int) $film['annee'] . ' — ' . $e($film['note']) . '/10</li>';
    }
    $html .= '</ul></body></html>';
    $response->getBody()->write($html);
    return $response->withHeader('Content-Type', 'text/html; charset=utf-8');
});

$app->get('/films/nouveau', static function (Request $request, Response $response): Response {
    $html = <<<'HTML'
<!doctype html><html lang="fr"><meta charset="utf-8"><title>Ajouter</title><body>
<h1>Ajouter un film</h1>
<form action="/films" method="post">
<label>Titre <input name="titre" required></label>
<label>Année <input name="annee" type="number" required></label>
<label>Note <input name="note" type="number" min="0" max="10" step="0.1" required></label>
<button>Créer</button>
</form></body></html>
HTML;
    $response->getBody()->write($html);
    return $response->withHeader('Content-Type', 'text/html; charset=utf-8');
});

$app->get('/films/{id:[0-9]+}', static function (Request $request, Response $response, array $args) use ($db, $e): Response {
    $film = $db->get('film', ['id', 'titre', 'annee', 'note'], ['id' => (int) $args['id']]);
    if ($film === null) {
        $response->getBody()->write('<h1>Film introuvable</h1>');
        return $response->withStatus(404)->withHeader('Content-Type', 'text/html; charset=utf-8');
    }
    $html = '<h1>' . $e($film['titre']) . '</h1><p>Année : ' . (int) $film['annee'] . '</p>';
    $html .= '<p>Note : ' . $e($film['note']) . '/10</p><p><a href="/films">Retour</a></p>';
    $response->getBody()->write($html);
    return $response->withHeader('Content-Type', 'text/html; charset=utf-8');
});

$app->post('/films', static function (Request $request, Response $response) use ($db): Response {
    $saisie = is_array($request->getParsedBody()) ? $request->getParsedBody() : [];
    $titre = trim((string) ($saisie['titre'] ?? ''));
    $annee = filter_var($saisie['annee'] ?? null, FILTER_VALIDATE_INT);
    $note = filter_var($saisie['note'] ?? null, FILTER_VALIDATE_FLOAT);
    $erreurs = [];
    if (mb_strlen($titre) < 2 || mb_strlen($titre) > 120) {
        $erreurs[] = 'Le titre doit contenir entre 2 et 120 caractères.';
    }
    if ($annee === false || $annee < 1895 || $annee > (int) date('Y') + 2) {
        $erreurs[] = "L'année est invalide.";
    }
    if ($note === false || $note < 0 || $note > 10) {
        $erreurs[] = 'La note doit être comprise entre 0 et 10.';
    }
    if ($erreurs !== []) {
        $response->getBody()->write('<h1>Données invalides</h1><ul><li>' . implode('</li><li>', $erreurs) . '</li></ul>');
        return $response->withStatus(422)->withHeader('Content-Type', 'text/html; charset=utf-8');
    }
    $db->insert('film', ['titre' => $titre, 'annee' => $annee, 'note' => $note]);
    $id = (int) $db->id();
    return $response->withHeader('Location', '/films/' . $id)->withStatus(303);
});

$app->run();
