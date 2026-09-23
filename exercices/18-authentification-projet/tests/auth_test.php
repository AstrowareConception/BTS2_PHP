<?php

require __DIR__ . '/../../../tests/Test.php';
require __DIR__ . '/../starter/auth_functions.php';

$valide = ['email' => 'ada@example.test', 'mot_de_passe' => 'une-phrase-longue', 'confirmation' => 'une-phrase-longue'];

Test::cas('email normalisé', fn () => Test::identique('ada@example.test', normaliserEmail(' ADA@EXAMPLE.TEST ')));
Test::cas('inscription valide', fn () => Test::identique([], validerInscriptionUtilisateur($valide)));
Test::cas('confirmation différente', function () use ($valide): void {
    $valide['confirmation'] = 'autre-phrase-longue';
    Test::vrai(isset(validerInscriptionUtilisateur($valide)['confirmation']));
});
Test::cas('administrateur autorisé', fn () => Test::identique(true, peutAdministrer(['id' => 1, 'role' => 'administrateur'])));
Test::cas('membre non administrateur', fn () => Test::identique(false, peutAdministrer(['id' => 2, 'role' => 'membre'])));
Test::cas('propriétaire autorisé', fn () => Test::identique(true, peutGererReservation(['id' => 7, 'role' => 'membre'], 7)));
Test::cas('autre membre refusé', fn () => Test::identique(false, peutGererReservation(['id' => 8, 'role' => 'membre'], 7)));
Test::termine();
