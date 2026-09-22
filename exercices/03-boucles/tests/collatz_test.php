<?php

require __DIR__ . '/../../../tests/Test.php';
require __DIR__ . '/../starter/collatz.php';

Test::cas('suite partant de 1', fn () => Test::identique([1], suiteCollatz(1)));
Test::cas('suite partant de 6', fn () => Test::identique([6, 3, 10, 5, 16, 8, 4, 2, 1], suiteCollatz(6)));
Test::cas('départ invalide refusé', function (): void {
    try {
        suiteCollatz(0);
        throw new RuntimeException('Une exception était attendue.');
    } catch (InvalidArgumentException) {
        Test::vrai(true);
    }
});
Test::termine();
