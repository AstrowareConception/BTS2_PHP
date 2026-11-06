<?php

declare(strict_types=1);

namespace App\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use LogicException;
use RuntimeException;

final class JetonJwt
{
    public const ISSUER = 'bts-sio-atelier26';
    public const AUDIENCE = 'bts-sio-api';
    public const DUREE_VIE = 900;

    public function __construct(private string $secret)
    {
        if (strlen($secret) < 32) {
            throw new RuntimeException('JWT_SECRET doit contenir au moins 32 caracteres.');
        }
    }

    public function emettre(int $compteId): string
    {
        // TODO 1 : préparer iss, aud, sub (chaîne), iat et exp.
        // TODO 2 : signer avec JWT::encode($claims, $this->secret, 'HS256').
        // Interdit : mot de passe, données personnelles inutiles ou rôle non maîtrisé.
        throw new LogicException('Émission JWT à implémenter.');
    }

    public function verifier(string $token): int
    {
        // TODO 1 : JWT::decode($token, new Key($this->secret, 'HS256')).
        // TODO 2 : vérifier iss, aud, présence de exp et sub = entier positif en texte.
        // TODO 3 : retourner l'ID vérifié en entier.
        // Ne jamais utiliser un payload simplement décodé en Base64url !
        throw new LogicException('Vérification JWT à implémenter.');
    }
}
