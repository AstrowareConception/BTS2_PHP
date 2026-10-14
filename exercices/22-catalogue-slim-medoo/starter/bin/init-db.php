<?php

declare(strict_types=1);

$racine = dirname(__DIR__);
$chemin = $racine . '/data/catalogue.sqlite';

$pdo = new PDO('sqlite:' . $chemin, null, null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$pdo->exec((string) file_get_contents($racine . '/data/schema.sql'));
$pdo->exec((string) file_get_contents($racine . '/data/fixtures.sql'));

echo "Base initialisée : {$chemin}\n";
