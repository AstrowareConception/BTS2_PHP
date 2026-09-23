<?php

declare(strict_types=1);

/** @return array<string,mixed> */
function normaliserInscription(array $source): array
{
    throw new LogicException('À compléter');
}

/** @return array<string,string> */
function validerInscription(array $donnees): array
{
    throw new LogicException('À compléter');
}

function e(string $valeur): string
{
    return htmlspecialchars($valeur, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

