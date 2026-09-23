<?php

require __DIR__ . '/../../../tests/Test.php';
require __DIR__ . '/../starter/session_functions.php';

Test::cas('ajout sans doublon', fn () => Test::identique([2, 5], ajouterFavori([2], 5)));
Test::cas('ajout idempotent', fn () => Test::identique([2, 5], ajouterFavori([2, 5], 5)));
Test::cas('retrait et réindexation', fn () => Test::identique([2, 8], retirerFavori([2, 5, 8], 5)));
Test::cas('flash consommé une fois', function (): void {
    $session = [];
    definirFlash($session, 'Ajouté');
    Test::identique(['message' => 'Ajouté', 'type' => 'succes'], consommerFlash($session));
    Test::identique(null, consommerFlash($session));
});
Test::cas('jeton stable et vérifiable', function (): void {
    $session = [];
    $jeton = obtenirJetonCsrf($session);
    Test::identique($jeton, obtenirJetonCsrf($session));
    Test::vrai(jetonCsrfValide($session, $jeton));
    Test::identique(false, jetonCsrfValide($session, 'faux'));
});
Test::termine();

