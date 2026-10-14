<?php

declare(strict_types=1);

namespace App\Repository;

use Medoo\Medoo;

final class FilmRepository
{
    public function __construct(private readonly Medoo $database)
    {
    }

    public function tous(): array
    {
        // TODO : SELECT des films non archivés, triés par titre.
        return [];
    }

    public function trouver(int $id): ?array
    {
        // TODO : retourner null lorsque Medoo retourne false.
        return null;
    }

    public function rechercher(string $texte): array
    {
        // TODO : utiliser l'opérateur de recherche Medoo [~].
        return [];
    }

    /** @param array{titre:string, annee:int, note:float} $donnees */
    public function ajouter(array $donnees): int
    {
        // TODO : insérer puis retourner l'identifiant créé.
        throw new \LogicException('Méthode ajouter() à implémenter');
    }
}
