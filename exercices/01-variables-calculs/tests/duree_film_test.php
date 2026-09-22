<?php

require __DIR__ . '/../../../tests/Test.php';
require __DIR__ . '/../starter/duree_film.php';

Test::cas('117 minutes', fn () => Test::identique('1 h 57 min', convertirDuree(117)));
Test::cas('minutes sur deux chiffres', fn () => Test::identique('2 h 05 min', convertirDuree(125)));
Test::cas('moins d’une heure', fn () => Test::identique('0 h 45 min', convertirDuree(45)));
Test::cas('zéro minute', fn () => Test::identique('0 h 00 min', convertirDuree(0)));
Test::termine();

