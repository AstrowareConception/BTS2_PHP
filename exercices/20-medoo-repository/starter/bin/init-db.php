<?php

declare(strict_types=1);

use App\Database;

require dirname(__DIR__) . '/vendor/autoload.php';

$racine = dirname(__DIR__);
$dossier = $racine . '/var';

if (!is_dir($dossier) && !mkdir($dossier, 0777, true) && !is_dir($dossier)) {
    throw new RuntimeException('Impossible de créer le dossier var.');
}

$database = Database::sqlite($dossier . '/cineclub.sqlite');
$database->pdo->exec((string) file_get_contents($racine . '/data/schema.sql'));
$database->pdo->exec((string) file_get_contents($racine . '/data/fixtures.sql'));

echo "Base SQLite initialisée dans var/cineclub.sqlite.\n";
