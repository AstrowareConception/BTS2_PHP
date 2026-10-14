<?php

declare(strict_types=1);

use App\Domain\Film;

require dirname(__DIR__) . '/vendor/autoload.php';

$film = new Film('Alien', 1979);

?><!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Atelier Composer</title>
</head>
<body>
    <h1><?= htmlspecialchars($film->description(), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') ?></h1>
</body>
</html>
