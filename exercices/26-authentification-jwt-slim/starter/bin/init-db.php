<?php

declare(strict_types=1);

use App\Database;

require dirname(__DIR__) . '/vendor/autoload.php';

$racine = dirname(__DIR__);
$pdo = Database::ouvrir($racine . '/data/atelier26.sqlite');
$sql = file_get_contents($racine . '/data/schema.sql');

if ($sql === false) {
    throw new RuntimeException('Schema SQL introuvable.');
}

$pdo->exec($sql);

$comptes = [
    ['alice@example.test', 'lecteur'],
    ['bob@example.test', 'lecteur'],
    ['admin@example.test', 'admin'],
];

$requete = $pdo->prepare(
    'INSERT INTO comptes (email, mot_de_passe, role) VALUES (:email, :hash, :role)'
);

foreach ($comptes as [$email, $role]) {
    $requete->execute([
        'email' => $email,
        'hash' => password_hash('BtsJwt2026!', PASSWORD_DEFAULT),
        'role' => $role,
    ]);
}

$notes = $pdo->prepare(
    'INSERT INTO notes_privees (proprietaire_id, titre, contenu) VALUES (:id, :titre, :contenu)'
);
$notes->execute(['id' => 1, 'titre' => 'Note Alice', 'contenu' => 'Lecture personnelle.']);
$notes->execute(['id' => 2, 'titre' => 'Note Bob', 'contenu' => 'Liste privée de Bob.']);

echo "Base SQLite initialisée (3 comptes, 2 notes).\n";
echo "Mot de passe de démonstration : BtsJwt2026! (jamais en production).\n";
