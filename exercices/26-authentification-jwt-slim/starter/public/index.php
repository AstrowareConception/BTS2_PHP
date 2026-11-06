<?php

declare(strict_types=1);

use App\Auth\AuthentificationMiddleware;
use App\Auth\JetonJwt;
use App\Database;
use App\Http\JsonResponse;
use App\Repository\CompteRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require dirname(__DIR__) . '/vendor/autoload.php';

$racine = dirname(__DIR__);
$secret = getenv('JWT_SECRET');

if (!is_string($secret) || strlen($secret) < 32) {
    throw new RuntimeException('Définir JWT_SECRET (au moins 32 caractères) avant de lancer le serveur.');
}

$comptes = new CompteRepository(Database::ouvrir($racine . '/data/atelier26.sqlite'));
$jetons = new JetonJwt($secret);
$auth = new AuthentificationMiddleware($jetons, $comptes);

$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(false, true, true); // Aucun détail technique exposé au client.

$app->get('/api/etat', static function (Request $requete, Response $reponse): Response {
    return JsonResponse::creer($reponse, ['statut' => 'ok']);
});

$app->post('/api/login', static function (Request $requete, Response $reponse) use ($comptes, $jetons): Response {
    $type = strtolower(trim(explode(';', $requete->getHeaderLine('Content-Type'))[0]));
    if ($type !== 'application/json') {
        return JsonResponse::erreur($reponse, 'MEDIA_INVALIDE', 'Content-Type application/json attendu.', 415);
    }

    try {
        $donnees = json_decode((string) $requete->getBody(), false, 512, JSON_THROW_ON_ERROR);
    } catch (JsonException) {
        return JsonResponse::erreur($reponse, 'JSON_INVALIDE', 'JSON mal formé.', 400);
    }

    if (!$donnees instanceof stdClass) {
        return JsonResponse::erreur($reponse, 'CORPS_INVALIDE', 'Un objet JSON est attendu.', 400);
    }

    $email = $donnees->email ?? null;
    $motDePasse = $donnees->mot_de_passe ?? null;
    if (!is_string($email) || trim($email) === '' || !is_string($motDePasse) || $motDePasse === '') {
        return JsonResponse::erreur($reponse, 'CHAMPS_INVALIDES', 'Email et mot de passe requis.', 422);
    }

    // TODO : rechercher le compte par email, puis vérifier password_verify().
    // TODO : si email OU mot de passe incorrect : même réponse 401 neutre.
    // TODO : émettre un JWT et répondre 200 :
    // {"token":"...","token_type":"Bearer","expires_in":900}
    return JsonResponse::erreur($reponse, 'NON_IMPLEMENTE', 'Connexion à compléter.', 501);
});

$app->get('/api/profil', static function (Request $requete, Response $reponse) use ($comptes): Response {
    // L'attribut n'est fiable QUE parce que le middleware l'a vérifié.
    $id = $requete->getAttribute('compte_id');
    if (!is_int($id)) {
        return JsonResponse::erreur($reponse, 'CONTEXTE_INVALIDE', 'Contexte d’authentification absent.', 500);
    }

    $compte = $comptes->parId($id);
    if ($compte === null) {
        return JsonResponse::erreur($reponse, 'NON_AUTHENTIFIE', 'Connexion nécessaire.', 401);
    }

    return JsonResponse::creer($reponse, [
        'id' => (int) $compte['id'],
        'email' => $compte['email'],
        'role' => $compte['role'],
    ]);
})->add($auth);

$app->get('/api/notes/{id}', static function (Request $requete, Response $reponse, array $args) use ($comptes): Response {
    $id = filter_var($args['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if ($id === false || $id === null) {
        return JsonResponse::erreur($reponse, 'IDENTIFIANT_INVALIDE', 'ID entier positif attendu.', 400);
    }

    $note = $comptes->noteParId($id);
    if ($note === null) {
        return JsonResponse::erreur($reponse, 'NOTE_ABSENTE', 'Note introuvable.', 404);
    }

    // TODO : comparer l'attribut compte_id vérifié et proprietaire_id de la note.
    // Si différents : 403. Si identiques : 200 + id/titre/contenu.
    // Ne jamais croire un user_id transmis dans le corps ou l'URL.
    return JsonResponse::erreur($reponse, 'NON_IMPLEMENTE', 'Contrôle de propriété à compléter.', 501);
})->add($auth);

$app->get('/api/admin/statistiques', static function (Request $requete, Response $reponse) use ($comptes): Response {
    // DÉFI : rôle admin lu depuis la base, 403 sinon, 200 + statistiques si autorisé.
    return JsonResponse::erreur($reponse, 'NON_IMPLEMENTE', 'Défi facultatif.', 501);
})->add($auth);

$app->run();
