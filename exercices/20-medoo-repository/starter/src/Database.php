<?php

declare(strict_types=1);

namespace App;

use Medoo\Medoo;

final class Database
{
    public static function sqlite(string $chemin): Medoo
    {
        return new Medoo([
            'type' => 'sqlite',
            'database' => $chemin,
        ]);
    }
}
