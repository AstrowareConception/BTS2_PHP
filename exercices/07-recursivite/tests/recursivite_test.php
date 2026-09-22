<?php
require __DIR__.'/../../../tests/Test.php'; require __DIR__.'/../starter/recursivite.php';
Test::cas('0!',fn()=>Test::identique(1,factorielleRecursive(0)));
Test::cas('5!',fn()=>Test::identique(120,factorielleRecursive(5)));
Test::cas('somme 2026',fn()=>Test::identique(10,sommeChiffresRecursive(2026)));
Test::cas('palindrome accentué',fn()=>Test::identique(true,palindromeRecursif('Ésope reste ici et se repose')));
Test::cas('Fibonacci récursif',fn()=>Test::identique(55,fibonacciRecursif(10)));
Test::cas('somme profonde',fn()=>Test::identique(15,sommeProfonde([1,[2,3],[4,[5]]])));
Test::termine();
