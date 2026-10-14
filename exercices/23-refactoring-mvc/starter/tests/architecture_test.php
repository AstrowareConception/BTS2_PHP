<?php

declare(strict_types=1);

$autoload = dirname(__DIR__) . '/vendor/autoload.php';
if (!is_file($autoload)) {
    fwrite(STDERR, "Lancez d'abord composer install.\n");
    exit(1);
}
require $autoload;

$classes = [
    App\Database::class,
    App\Domain\Film::class,
    App\Repository\FilmRepository::class,
    App\Service\FilmValidator::class,
    App\View\View::class,
    App\Controller\FilmController::class,
];

$echecs = 0;
foreach ($classes as $classe) {
    if (!class_exists($classe)) {
        ++$echecs;
        echo "[ECHEC] Classe absente : {$classe}\n";
        continue;
    }
    echo "[OK] {$classe}\n";
}

$index = (string) file_get_contents(dirname(__DIR__) . '/public/index.php');
$lignes = substr_count($index, "\n") + 1;
if ($lignes > 60) {
    ++$echecs;
    echo "[ECHEC] public/index.php contient {$lignes} lignes, maximum attendu : 60.\n";
}

exit($echecs === 0 ? 0 : 1);
