<?php

declare(strict_types=1);

namespace App\Http;

use Psr\Http\Message\ResponseInterface;

final class JsonResponse
{
    public static function creer(ResponseInterface $response, mixed $donnees, int $statut = 200): ResponseInterface
    {
        if ($statut !== 204) {
            $response->getBody()->write((string) json_encode(
                $donnees,
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR
            ));
        }

        return $response
            ->withHeader('Content-Type', 'application/json; charset=utf-8')
            ->withStatus($statut);
    }

    public static function erreur(
        ResponseInterface $response,
        string $code,
        string $message,
        int $statut,
        array $details = []
    ): ResponseInterface {
        return self::creer($response, [
            'erreur' => [
                'code' => $code,
                'message' => $message,
                'details' => (object) $details,
            ],
        ], $statut);
    }
}
