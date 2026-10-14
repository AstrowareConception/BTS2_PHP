<?php

declare(strict_types=1);

$autoload = dirname(__DIR__) . '/vendor/autoload.php';

if (!is_file($autoload)) {
    echo "SKIP — exécutez d'abord composer install dans starter/.\n";
    exit(0);
}

require $autoload;

use App\Database;
use App\Repository\FilmRepository;

$fichier = tempnam(sys_get_temp_dir(), 'cineclub-');
if ($fichier === false) {
    throw new RuntimeException('Impossible de créer la base temporaire.');
}

$database = Database::sqlite($fichier);
$database->pdo->exec((string) file_get_contents(dirname(__DIR__) . '/data/schema.sql'));
$database->pdo->exec((string) file_get_contents(dirname(__DIR__) . '/data/fixtures.sql'));
$repository = new FilmRepository($database);

$echecs = [];

if (count($repository->tous()) !== 3) {
    $echecs[] = 'tous() doit retourner les trois films actifs';
}

if (($repository->trouver(1)['titre'] ?? null) !== 'Alien') {
    $echecs[] = 'trouver(1) doit retourner Alien';
}

$id = $repository->ajouter(['titre' => 'Arrival', 'annee' => 2016, 'note' => 8.0]);
if ($id < 4 || ($repository->trouver($id)['titre'] ?? null) !== 'Arrival') {
    $echecs[] = 'ajouter() doit créer et retourner un identifiant';
}

@unlink($fichier);

if ($echecs !== []) {
    fwrite(STDERR, "Échecs :\n- " . implode("\n- ", $echecs) . "\n");
    exit(1);
}

echo "OK — repository Medoo fonctionnel.\n";
