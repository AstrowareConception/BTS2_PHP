<?php

require __DIR__ . '/../../../tests/Test.php';
require __DIR__ . '/../starter/film_validation.php';

$valide = ['titre' => ' Alien ', 'annee' => '1979', 'duree' => '117', 'note' => '8.5', 'genre_id' => '4', 'resume' => ' Un équipage isolé. '];

Test::cas('normalisation texte', function () use ($valide): void {
    $film = normaliserFilm($valide);
    Test::identique('Alien', $film['titre']);
    Test::identique('Un équipage isolé.', $film['resume']);
});
Test::cas('film valide', fn () => Test::identique([], validerFilm(normaliserFilm($valide))));
Test::cas('année trop ancienne', function () use ($valide): void {
    $valide['annee'] = '1800';
    Test::vrai(isset(validerFilm(normaliserFilm($valide))['annee']));
});
Test::cas('note facultative', function () use ($valide): void {
    $valide['note'] = '';
    Test::identique([], validerFilm(normaliserFilm($valide)));
});
Test::cas('note hors borne', function () use ($valide): void {
    $valide['note'] = '12';
    Test::vrai(isset(validerFilm(normaliserFilm($valide))['note']));
});
Test::termine();

