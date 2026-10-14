<?php

declare(strict_types=1);

$autoload = dirname(__DIR__) . '/vendor/autoload.php';

if (!is_file($autoload)) {
    echo "SKIP — exécutez d'abord composer install dans starter/.\n";
    exit(0);
}

require $autoload;

use App\Domain\Film;

$film = new Film('Alien', 1979);

if ($film->description() !== 'Alien (1979)') {
    fwrite(STDERR, "Échec : description() doit retourner Alien (1979).\n");
    exit(1);
}

echo "OK — la classe est chargée automatiquement.\n";
