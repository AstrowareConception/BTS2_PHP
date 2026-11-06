<?php

declare(strict_types=1);

use Firebase\JWT\JWT;

require dirname(__DIR__) . '/vendor/autoload.php';

$base = rtrim((string) (getenv('API_BASE_URL') ?: 'http://localhost:8000'), '/');
$secret = getenv('JWT_SECRET');

if (!is_string($secret) || strlen($secret) < 32) {
    fwrite(STDERR, "Définir JWT_SECRET dans le terminal de test.\n");
    exit(2);
}

/** @return array{status:int,body:array<string,mixed>|null,headers:array<int,string>} */
function appel(string $methode, string $chemin, ?array $donnees = null, ?string $token = null, ?string $corpsBrut = null, string $media = 'application/json'): array
{
    global $base;

    $headers = ['Accept: application/json'];
    if ($donnees !== null || $corpsBrut !== null) {
        $headers[] = 'Content-Type: ' . $media;
    }
    if ($token !== null) {
        $headers[] = 'Authorization: Bearer ' . $token;
    }

    $corps = $corpsBrut ?? ($donnees !== null ? json_encode($donnees, JSON_THROW_ON_ERROR) : '');
    $contexte = stream_context_create(['http' => [
        'method' => $methode,
        'header' => implode("\r\n", $headers),
        'content' => $corps,
        'ignore_errors' => true,
        'timeout' => 4,
    ]]);

    $brut = @file_get_contents($base . $chemin, false, $contexte);
    if ($brut === false) {
        throw new RuntimeException('Serveur inaccessible : lancer composer start dans un autre terminal.');
    }

    /** @var list<string> $http_response_header */
    $reponseHeaders = $http_response_header ?? [];
    preg_match('~^HTTP/\S+\s+(\d{3})~', $reponseHeaders[0] ?? '', $match);
    $objet = json_decode($brut, true);

    return [
        'status' => (int) ($match[1] ?? 0),
        'body' => is_array($objet) ? $objet : null,
        'headers' => $reponseHeaders,
    ];
}

$echecs = 0;
function verifier(string $titre, bool $ok): void
{
    global $echecs;
    echo ($ok ? '[OK] ' : '[ECHEC] ') . $titre . "\n";
    if (!$ok) {
        ++$echecs;
    }
}

try {
    $public = appel('GET', '/api/etat');
    verifier('API publique -> 200', $public['status'] === 200);

    $malForme = appel('POST', '/api/login', null, null, '{"email":');
    verifier('JSON mal formé -> 400', $malForme['status'] === 400);

    $media = appel('POST', '/api/login', null, null, 'bonjour', 'text/plain');
    verifier('Média non pris en charge -> 415', $media['status'] === 415);

    $sansChamps = appel('POST', '/api/login', ['email' => 52]);
    verifier('Champs invalides -> 422', $sansChamps['status'] === 422);

    $mauvais = appel('POST', '/api/login', [
        'email' => 'alice@example.test', 'mot_de_passe' => 'incorrect',
    ]);
    verifier('Mot de passe invalide -> 401', $mauvais['status'] === 401);

    $alice = appel('POST', '/api/login', [
        'email' => 'alice@example.test', 'mot_de_passe' => 'BtsJwt2026!',
    ]);
    $jeton = $alice['body']['token'] ?? null;
    verifier('Connexion -> 200 + token Bearer', $alice['status'] === 200
        && is_string($jeton) && substr_count($jeton, '.') === 2
        && ($alice['body']['token_type'] ?? '') === 'Bearer'
        && ($alice['body']['expires_in'] ?? 0) === 900);

    $anonyme = appel('GET', '/api/profil');
    verifier('Accès privé anonyme -> 401', $anonyme['status'] === 401);
    verifier('401 possède WWW-Authenticate', count(array_filter(
        $anonyme['headers'], fn (string $h): bool => str_starts_with(strtolower($h), 'www-authenticate: bearer')
    )) > 0);

    if (is_string($jeton)) {
        $profil = appel('GET', '/api/profil', null, $jeton);
        verifier('Profil Alice -> 200', $profil['status'] === 200
            && ($profil['body']['email'] ?? '') === 'alice@example.test');

        $noteAlice = appel('GET', '/api/notes/1', null, $jeton);
        verifier('Alice lit sa note -> 200', $noteAlice['status'] === 200
            && ($noteAlice['body']['titre'] ?? '') === 'Note Alice');

        $noteBob = appel('GET', '/api/notes/2', null, $jeton);
        verifier('Alice lit la note de Bob -> 403', $noteBob['status'] === 403);

        $inconnue = appel('GET', '/api/notes/9999', null, $jeton);
        verifier('Note absente -> 404', $inconnue['status'] === 404);

        $parties = explode('.', $jeton);
        $parties[1] = ($parties[1][0] === 'A' ? 'B' : 'A') . substr($parties[1], 1);
        $falsifie = implode('.', $parties);
        verifier('Payload falsifié -> 401', appel('GET', '/api/profil', null, $falsifie)['status'] === 401);

        $expire = JWT::encode([
            'iss' => 'bts-sio-atelier26', 'aud' => 'bts-sio-api',
            'sub' => '1', 'iat' => time() - 3600, 'exp' => time() - 60,
        ], $secret, 'HS256');
        verifier('JWT expiré signé -> 401', appel('GET', '/api/profil', null, $expire)['status'] === 401);
    } else {
        verifier('Profil, notes et jetons : nécessitent une connexion implémentée', false);
    }
} catch (Throwable $erreur) {
    fwrite(STDERR, 'Erreur de recette : ' . $erreur->getMessage() . "\n");
    exit(2);
}

echo "\n" . ($echecs === 0 ? 'Recette réussie.' : $echecs . ' contrôle(s) en échec.') . "\n";
exit($echecs === 0 ? 0 : 1);
