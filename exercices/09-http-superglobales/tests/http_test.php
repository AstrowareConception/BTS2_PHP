<?php

require __DIR__ . '/../../../tests/Test.php';
require __DIR__ . '/../starter/functions.php';

$films = [
    ['titre' => 'Alien', 'annee' => 1979, 'genre' => 'science-fiction'],
    ['titre' => 'Metropolis', 'annee' => 1927, 'genre' => 'science-fiction'],
    ['titre' => 'Parasite', 'annee' => 2019, 'genre' => 'drame'],
    ['titre' => 'Les Temps modernes', 'annee' => 1936, 'genre' => 'comedie'],
];

Test::cas('source vide : les trois valeurs par défaut sont retournées', fn () => Test::identique(
    ['q' => '', 'annee' => '', 'genres' => []],
    lireFiltres([])
));

Test::cas('normalisation : espaces retirés et genre non textuel ignoré', fn () => Test::identique(
    ['q' => 'Alien', 'annee' => '1970', 'genres' => ['science-fiction']],
    lireFiltres(['q' => ' Alien ', 'annee' => ' 1970 ', 'genres' => ['science-fiction', 12]])
));

Test::cas('source falsifiée : les types inattendus sont neutralisés', fn () => Test::identique(
    ['q' => '', 'annee' => '', 'genres' => []],
    lireFiltres(['q' => ['Alien'], 'annee' => 1970, 'genres' => 'science-fiction'])
));

Test::cas('aucun filtre actif : tous les films sont conservés', fn () => Test::identique(
    $films,
    filtrerFilms($films, ['q' => '', 'annee' => '', 'genres' => []])
));

Test::cas('titre : la recherche ne dépend pas des majuscules', fn () => Test::identique(
    [$films[0]],
    filtrerFilms($films, ['q' => 'ALI', 'annee' => '', 'genres' => []])
));

Test::cas('année : elle représente une valeur minimale', fn () => Test::identique(
    [$films[0], $films[2]],
    filtrerFilms($films, ['q' => '', 'annee' => '1970', 'genres' => []])
));

Test::cas('genres : plusieurs sélections sont des alternatives', fn () => Test::identique(
    [$films[2], $films[3]],
    filtrerFilms($films, ['q' => '', 'annee' => '', 'genres' => ['drame', 'comedie']])
));

Test::cas('critères cumulés : tous les critères actifs doivent réussir', fn () => Test::identique(
    [$films[0]],
    filtrerFilms($films, ['q' => 'ALI', 'annee' => '1970', 'genres' => ['science-fiction', 'drame']])
));

Test::cas('aucune correspondance : un tableau vide est retourné', fn () => Test::identique(
    [],
    filtrerFilms($films, ['q' => 'Titanic', 'annee' => '', 'genres' => []])
));

Test::termine();
