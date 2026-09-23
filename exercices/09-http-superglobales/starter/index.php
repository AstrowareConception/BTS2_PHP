<?php

require_once __DIR__ . '/functions.php';

$films = [
    ['titre' => 'Alien', 'annee' => 1979, 'genre' => 'science-fiction', 'note' => 8.5],
    ['titre' => 'Metropolis', 'annee' => 1927, 'genre' => 'science-fiction', 'note' => 8.3],
    ['titre' => 'Parasite', 'annee' => 2019, 'genre' => 'drame', 'note' => 8.5],
    ['titre' => 'Les Temps modernes', 'annee' => 1936, 'genre' => 'comedie', 'note' => 8.5],
];

$filtres = lireFiltres($_GET);
$filmsVisibles = filtrerFilms($films, $filtres);

// Construisez le formulaire GET puis la liste des résultats.

