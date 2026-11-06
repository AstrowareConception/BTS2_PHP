<?php

declare(strict_types=1);

namespace App\Auth;

use App\Http\JsonResponse;
use App\Repository\CompteRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response as SlimResponse;

final class AuthentificationMiddleware
{
    public function __construct(
        private JetonJwt $jetons,
        private CompteRepository $comptes
    ) {
    }

    public function __invoke(Request $request, RequestHandlerInterface $handler): Response
    {
        // TODO :
        // 1. Lire Authorization: Bearer <token> et refuser toute autre forme (401).
        // 2. Valider le token via JetonJwt::verifier(), sans faire confiance au payload brut.
        // 3. Vérifier avec CompteRepository::parId() que le compte existe encore.
        // 4. Transmettre l'identité vérifiée :
        //    return $handler->handle($request->withAttribute('compte_id', $id));
        // 5. Pour les erreurs JWT attendues : 401 + WWW-Authenticate: Bearer.
        // Ne jamais laisser passer une demande tant que le contrôle est incomplet.

        return JsonResponse::erreur(
            new SlimResponse(),
            'NON_IMPLEMENTE',
            "Middleware d'authentification à compléter.",
            501
        );
    }
}
