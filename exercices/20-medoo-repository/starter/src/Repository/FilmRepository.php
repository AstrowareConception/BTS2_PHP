<?php

declare(strict_types=1);

namespace App\Repository;

use Medoo\Medoo;

final readonly class FilmRepository
{
    public function __construct(private Medoo $database)
    {
    }

    /** @return list<array<string, mixed>> */
    public function tous(): array
    {
        // TODO : sélectionner les colonnes utiles, exclure les archives et trier.
        return [];
    }

    /** @return array<string, mixed>|null */
    public function trouver(int $id): ?array
    {
        // TODO : utiliser get() ou select() et normaliser l'absence en null.
        return null;
    }

    /** @return list<array<string, mixed>> */
    public function rechercher(string $texte): array
    {
        // TODO : utiliser une condition structurée [~], sans SQL concaténé.
        return [];
    }

    /** @param array{titre:string, annee:int, note:float|null} $donnees */
    public function ajouter(array $donnees): int
    {
        // TODO : insérer puis retourner l'identifiant créé avec id().
        return 0;
    }

    public function modifierNote(int $id, float $note): bool
    {
        // TODO : mettre à jour et examiner rowCount() sur le PDOStatement retourné.
        return false;
    }

    public function archiver(int $id): bool
    {
        // TODO : réaliser une suppression logique.
        return false;
    }
}
