<?php

require __DIR__ . '/../../../tests/Test.php';
require __DIR__ . '/../starter/decisions.php';

Test::cas('seuil exceptionnel', fn () => Test::identique('Exceptionnel', appreciationFilm(8.5)));
Test::cas('juste sous le seuil', fn () => Test::identique('Très bon', appreciationFilm(8.49)));
Test::cas('tarif mineur membre', fn () => Test::identique(4.0, calculerTarif(17, true)));
Test::cas('tarif adulte', fn () => Test::identique(9.0, calculerTarif(18, false)));
Test::cas('tarif senior', fn () => Test::identique(7.0, calculerTarif(65, false)));
Test::cas('1900 n’est pas bissextile', fn () => Test::identique(false, estBissextile(1900)));
Test::cas('2000 est bissextile', fn () => Test::identique(true, estBissextile(2000)));
Test::cas('badges cumulés', function (): void {
    $badges = creerBadges(['annee' => 1979, 'note' => 8.7, 'disponible' => true, 'duree' => 117]);
    Test::identique(['Classique', 'Coup de cœur', 'Disponible'], $badges);
});
Test::termine();

