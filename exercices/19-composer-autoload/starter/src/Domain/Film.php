<?php

declare(strict_types=1);

namespace App\Domain;

final readonly class Film
{
    public function __construct(
        private string $titre,
        private int $annee,
    ) {
    }

    public function description(): string
    {
        // À compléter : le test attend par exemple « Alien (1979) ».
        return '';
    }
}
