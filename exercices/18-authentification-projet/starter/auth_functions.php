<?php

declare(strict_types=1);

function normaliserEmail(mixed $email): string
{
    return is_string($email) ? mb_strtolower(trim($email), 'UTF-8') : '';
}

/** @return array<string,string> */
function validerInscriptionUtilisateur(array $source): array
{
    throw new LogicException('À compléter');
}

function peutAdministrer(?array $utilisateur): bool
{
    throw new LogicException('À compléter');
}

function peutGererReservation(?array $utilisateur, int $proprietaireId): bool
{
    throw new LogicException('À compléter');
}

