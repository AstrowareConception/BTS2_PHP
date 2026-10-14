<?php

declare(strict_types=1);

$racine = dirname(__DIR__);
$pdo = new PDO('sqlite:' . $racine . '/data/catalogue.sqlite', null, null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
$pdo->exec((string) file_get_contents($racine . '/data/schema.sql'));
$pdo->exec((string) file_get_contents($racine . '/data/fixtures.sql'));

echo "Base réinitialisée.\n";
