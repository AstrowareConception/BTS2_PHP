<?php

require __DIR__ . '/../../../tests/Test.php';
require __DIR__ . '/../starter/functions.php';

$films = [
    ['titre' => 'Alien', 'annee' => 1979, 'genre' => 'science-fiction'],
    ['titre' => 'Parasite', 'annee' => 2019, 'genre' => 'drame'],
];

Test::cas('source vide', fn () => Test::identique(
    ['q' => '', 'annee' => '', 'genres' => []],
    lireFiltres([])
));
Test::cas('normalisation des filtres', fn () => Test::identique(
    ['q' => 'Alien', 'annee' => '1970', 'genres' => ['science-fiction']],
    lireFiltres(['q' => ' Alien ', 'annee' => ' 1970 ', 'genres' => ['science-fiction', 12]])
));
Test::cas('critères cumulés', fn () => Test::identique(
    [$films[0]],
    filtrerFilms($films, ['q' => 'ALI', 'annee' => '1970', 'genres' => ['science-fiction']])
));
Test::termine();

