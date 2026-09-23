<?php

declare(strict_types=1);

/** @return array{theme:string, densite:string, pagination:int} */
function validerPreferences(array $source): array
{
    throw new LogicException('À compléter');
}

function optionsCookie(bool $https): array
{
    return [
        'expires' => time() + 30 * 86400,
        'path' => '/',
        'secure' => $https,
        'httponly' => true,
        'samesite' => 'Lax',
    ];
}

