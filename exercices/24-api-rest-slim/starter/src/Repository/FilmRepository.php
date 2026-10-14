<?php

declare(strict_types=1);

namespace App\Repository;

use Medoo\Medoo;

final class FilmRepository
{
    public function __construct(private readonly Medoo $db)
    {
    }

    public function tous(?string $recherche = null, int $limite = 20, int $offset = 0): array
    {
        $conditions = ['ORDER' => ['titre' => 'ASC'], 'LIMIT' => [$offset, $limite]];
        if ($recherche !== null && $recherche !== '') {
            $conditions['titre[~]'] = $recherche;
        }
        return $this->db->select('film', ['id', 'titre', 'annee', 'note'], $conditions);
    }

    public function trouver(int $id): ?array
    {
        $film = $this->db->get('film', ['id', 'titre', 'annee', 'note'], ['id' => $id]);
        return $film === null ? null : $film;
    }

    /** @param array{titre:string, annee:int, note:float} $donnees */
    public function ajouter(array $donnees): int
    {
        $this->db->insert('film', $donnees);
        return (int) $this->db->id();
    }

    public function modifier(int $id, array $changements): bool
    {
        $resultat = $this->db->update('film', $changements, ['id' => $id]);
        return $resultat->rowCount() > 0;
    }

    public function supprimer(int $id): bool
    {
        return $this->db->delete('film', ['id' => $id])->rowCount() > 0;
    }
}
