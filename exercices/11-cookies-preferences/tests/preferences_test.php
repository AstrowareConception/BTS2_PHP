<?php

require __DIR__ . '/../../../tests/Test.php';
require __DIR__ . '/../starter/preferences.php';

Test::cas('valeurs par défaut', fn () => Test::identique(
    ['theme' => 'clair', 'densite' => 'aeree', 'pagination' => 12],
    validerPreferences([])
));
Test::cas('préférences valides', fn () => Test::identique(
    ['theme' => 'sombre', 'densite' => 'compacte', 'pagination' => 24],
    validerPreferences(['theme' => 'sombre', 'densite' => 'compacte', 'pagination' => '24'])
));
Test::cas('cookies falsifiés', fn () => Test::identique(
    ['theme' => 'clair', 'densite' => 'aeree', 'pagination' => 12],
    validerPreferences(['theme' => '<script>', 'densite' => 'immense', 'pagination' => '999'])
));
Test::termine();

