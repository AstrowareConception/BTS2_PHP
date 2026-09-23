<?php

require __DIR__ . '/../../../tests/Test.php';
require __DIR__ . '/../starter/functions.php';

$valide = ['nom' => 'Ada Lovelace', 'email' => 'ada@example.test', 'age' => '36', 'seance' => 'alien', 'places' => '2', 'commentaire' => ' Premier rang '];

Test::cas('normalisation', function () use ($valide): void {
    $obtenu = normaliserInscription($valide);
    Test::identique('Premier rang', $obtenu['commentaire']);
});
Test::cas('inscription valide', fn () => Test::identique([], validerInscription(normaliserInscription($valide))));
Test::cas('âge hors borne', function () use ($valide): void {
    $valide['age'] = '14';
    Test::vrai(isset(validerInscription(normaliserInscription($valide))['age']));
});
Test::cas('séance falsifiée', function () use ($valide): void {
    $valide['seance'] = 'film-secret';
    Test::vrai(isset(validerInscription(normaliserInscription($valide))['seance']));
});
Test::cas('tableau inattendu', function () use ($valide): void {
    $valide['nom'] = ['attaque'];
    Test::vrai(isset(validerInscription(normaliserInscription($valide))['nom']));
});
Test::termine();

