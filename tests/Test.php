<?php

declare(strict_types=1);

final class Test
{
    private static int $reussites = 0;
    private static int $echecs = 0;

    public static function cas(string $nom, callable $test): void
    {
        try {
            $test();
            self::$reussites++;
            echo "[OK] {$nom}\n";
        } catch (Throwable $erreur) {
            self::$echecs++;
            echo "[ECHEC] {$nom}\n        {$erreur->getMessage()}\n";
        }
    }

    public static function identique(mixed $attendu, mixed $obtenu): void
    {
        if ($attendu !== $obtenu) {
            throw new RuntimeException(
                'Attendu : ' . var_export($attendu, true)
                . ' ; obtenu : ' . var_export($obtenu, true)
            );
        }
    }

    public static function vrai(bool $condition, string $message = 'La condition devrait être vraie.'): void
    {
        if (!$condition) {
            throw new RuntimeException($message);
        }
    }

    public static function termine(): never
    {
        echo "\n" . self::$reussites . " réussite(s), " . self::$echecs . " échec(s).\n";
        exit(self::$echecs === 0 ? 0 : 1);
    }
}
