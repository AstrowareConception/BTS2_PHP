<?php

declare(strict_types=1);

$racine = dirname(__DIR__);
$tests = glob($racine . '/exercices/*/tests/*_test.php');
sort($tests);

if ($tests === []) {
    fwrite(STDERR, "Aucun test trouvé.\n");
    exit(1);
}

$echecs = 0;

foreach ($tests as $test) {
    $nom = str_replace($racine . '/', '', $test);
    echo "\n=== {$nom} ===\n";
    passthru(escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg($test), $code);
    if ($code !== 0) {
        $echecs++;
    }
}

echo "\n";
if ($echecs > 0) {
    echo "{$echecs} fichier(s) de test en échec. C'est normal tant que les exercices ne sont pas terminés.\n";
    exit(1);
}

echo "Tous les tests réussissent.\n";

