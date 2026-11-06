<?php

declare(strict_types=1);

namespace App\Repository;

use PDO;

final class CompteRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    /** @return array<string, mixed>|null */
    public function parEmail(string $email): ?array
    {
        $requete = $this->pdo->prepare(
            'SELECT id, email, mot_de_passe, role FROM comptes WHERE email = :email'
        );
        $requete->execute(['email' => $email]);
        $ligne = $requete->fetch();

        return $ligne === false ? null : $ligne;
    }

    /** @return array<string, mixed>|null */
    public function parId(int $id): ?array
    {
        $requete = $this->pdo->prepare(
            'SELECT id, email, role FROM comptes WHERE id = :id'
        );
        $requete->execute(['id' => $id]);
        $ligne = $requete->fetch();

        return $ligne === false ? null : $ligne;
    }

    /** @return array<string, mixed>|null */
    public function noteParId(int $id): ?array
    {
        $requete = $this->pdo->prepare(
            'SELECT id, proprietaire_id, titre, contenu FROM notes_privees WHERE id = :id'
        );
        $requete->execute(['id' => $id]);
        $ligne = $requete->fetch();

        return $ligne === false ? null : $ligne;
    }

    /** @return array{comptes:int,notes:int} */
    public function statistiques(): array
    {
        return [
            'comptes' => (int) $this->pdo->query('SELECT COUNT(*) FROM comptes')->fetchColumn(),
            'notes' => (int) $this->pdo->query('SELECT COUNT(*) FROM notes_privees')->fetchColumn(),
        ];
    }
}
