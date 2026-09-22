<?php
require __DIR__.'/../../../tests/Test.php'; require __DIR__.'/../starter/algorithmes.php';
Test::cas('F(0)',fn()=>Test::identique(0,fibonacciIteratif(0)));
Test::cas('F(10)',fn()=>Test::identique(55,fibonacciIteratif(10)));
Test::cas('1 non premier',fn()=>Test::identique(false,estPremier(1)));
Test::cas('97 premier',fn()=>Test::identique(true,estPremier(97)));
Test::cas('crible 30',fn()=>Test::identique([2,3,5,7,11,13,17,19,23,29],cribleEratosthene(30)));
Test::cas('28 parfait',fn()=>Test::identique(true,estParfait(28)));
Test::cas('12 imparfait',fn()=>Test::identique(false,estParfait(12)));
Test::termine();

