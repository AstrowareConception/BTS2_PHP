<?php

declare(strict_types=1);

function trouverUtilisateurParEmail(PDO $pdo, string $email): array|false
{
    throw new LogicException('À compléter');
}

function creerUtilisateur(PDO $pdo, string $email, string $hash): int
{
    throw new LogicException('À compléter');
}

function actualiserHash(PDO $pdo, int $id, string $hash): void
{
    throw new LogicException('Défi à compléter');
}

