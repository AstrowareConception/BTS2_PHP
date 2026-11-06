# Atelier 26 — Compte rendu et recette JWT

**Binôme :** à renseigner  
**Date :** à renseigner  
**URL locale :** http://localhost:8000

## 1. Schéma à réaliser

Dessinez : client → `POST /api/login` → vérification PDO/`password_verify` → émission JWT → `Authorization: Bearer` → middleware → route → contrôle de propriété → réponse.

## 2. Cas à observer

| Scénario | Attendu | Obtenu | Preuve / observation |
|---|---:|---|---|
| Route publique | 200 | | |
| Connexion Alice correcte | 200 + token | | |
| Connexion mot de passe incorrect | 401 | | |
| JSON illisible | 400 | | |
| Média `text/plain` | 415 | | |
| Route privée sans jeton | 401 | | |
| Route privée avec JWT Alice | 200 | | |
| Alice lit sa propre note | 200 | | |
| Alice lit la note de Bob | 403 | | |
| Identifiant de note inconnu | 404 | | |
| Jeton dont la signature a été changée | 401 | | |
| Jeton expiré, mais correctement signé | 401 | | |

La recette automatisée vérifie une partie de ces contrats. Les explications restent à rédiger.

## 3. Analyse de sécurité

**Question A :** pourquoi décoder simplement le payload en Base64url ne suffit-il pas pour identifier un utilisateur ?

*Votre réponse :*

**Question B :** quelle différence entre un JWT falsifié et un JWT volé ?

*Votre réponse :*

**Question C :** quelle est la conséquence d'une déconnexion consistant uniquement à oublier le jeton côté client ?

*Votre réponse :*

**Question D :** pourquoi `401` et `403` ne peuvent-ils pas être utilisés indifféremment ?

*Votre réponse :*

## 4. Architecture et bilan

Expliquez le rôle précis de `JetonJwt`, `AuthentificationMiddleware`, `CompteRepository` et du contrôleur de la route privée. Indiquez ce qui manque encore pour un déploiement public.
