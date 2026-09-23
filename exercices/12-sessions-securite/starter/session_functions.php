<?php

declare(strict_types=1);

/** @return int[] */
function ajouterFavori(array $favoris, int $filmId): array
{
    throw new LogicException('À compléter');
}

/** @return int[] */
function retirerFavori(array $favoris, int $filmId): array
{
    throw new LogicException('À compléter');
}

function definirFlash(array &$session, string $message, string $type = 'succes'): void
{
    throw new LogicException('À compléter');
}

/** @return array{message:string,type:string}|null */
function consommerFlash(array &$session): ?array
{
    throw new LogicException('À compléter');
}

function obtenirJetonCsrf(array &$session): string
{
    throw new LogicException('À compléter');
}

function jetonCsrfValide(array $session, string $jetonRecu): bool
{
    throw new LogicException('À compléter');
}

