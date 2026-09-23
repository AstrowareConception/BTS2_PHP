<?php

declare(strict_types=1);

function reserverNaivement(PDO $pdo, int $utilisateurId, int $seanceId): void
{
    $requete = $pdo->prepare('SELECT places_restantes FROM seances WHERE id = :id');
    $requete->execute(['id' => $seanceId]);
    $places = $requete->fetchColumn();

    if ($places === false || (int) $places < 1) {
        throw new RuntimeException('Aucune place disponible.');
    }

    // Rend volontairement la condition de concurrence plus facile à observer.
    usleep(500_000);

    $pdo->prepare('UPDATE seances SET places_restantes = places_restantes - 1 WHERE id = :id')
        ->execute(['id' => $seanceId]);

    $pdo->prepare('INSERT INTO reservations (utilisateur_id, seance_id) VALUES (:utilisateur, :seance)')
        ->execute(['utilisateur' => $utilisateurId, 'seance' => $seanceId]);
}

// Ce code sert à reproduire l'incident. Ne le conservez pas comme solution.

