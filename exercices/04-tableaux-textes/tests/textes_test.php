<?php
require __DIR__.'/../../../tests/Test.php';
require __DIR__.'/../starter/functions.php';
Test::cas('normalisation', fn()=>Test::identique('cinéma fantastique', normaliserTexte('  CINÉMA FANTASTIQUE  ')));
Test::cas('résumé intact', fn()=>Test::identique('un texte court', creerResumeCourt('un texte court', 5)));
Test::cas('résumé limité', fn()=>Test::identique('un texte un peu…', creerResumeCourt('un texte un peu plus long', 4)));
Test::cas('fréquences', fn()=>Test::identique(['le'=>2,'film'=>1], compterMots('le film le')));
Test::termine();

