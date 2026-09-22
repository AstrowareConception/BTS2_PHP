<?php
require __DIR__.'/../../../tests/Test.php'; require __DIR__.'/../starter/functions.php';
Test::cas('ISBN exemple',fn()=>Test::identique('2',calculerCleIsbn10('0-306-40615')));
Test::cas('ISBN clé X',fn()=>Test::identique('X',calculerCleIsbn10('0-8044-2957')));
Test::cas('palindrome',fn()=>Test::identique(true,estPalindrome('Ésope reste ici et se repose')));
Test::cas('non palindrome',fn()=>Test::identique(false,estPalindrome('PHP moderne')));
Test::termine();

