<?php

declare(strict_types=1);

namespace App\Http;

use Psr\Http\Message\ResponseInterface as Response;

final class JsonResponse
{
    public static function creer(Response $response, array $donnees, int $statut = 200): Response
    {
        $response->getBody()->write(json_encode(
            $donnees,
            JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE
        ));

        return $response->withStatus($statut)
            ->withHeader('Content-Type', 'application/json; charset=utf-8')
            ->withHeader('Cache-Control', 'no-store');
    }

    public static function erreur(Response $response, string $code, string $message, int $statut): Response
    {
        return self::creer($response, [
            'erreur' => ['code' => $code, 'message' => $message],
        ], $statut);
    }
}
