# Atelier 24 — Concevoir une API REST avec Slim

**Durée : 2 h 30 — Niveau : difficile — Prérequis : Slim, Medoo, JSON et statuts HTTP**

Une API ne se résume pas à « renvoyer du JSON ». Elle publie un contrat : ressources, représentations, méthodes, statuts, en-têtes et erreurs prévisibles. Vous allez compléter une API de films, puis la faire tester par un autre groupe qui ne doit lire que sa documentation.

## Mise en route (15 min)

```bash
cd starter
composer install
php bin/init-db.php
composer start
```

Les lectures `GET` et le repository sont fournis comme exemples. Les écritures renvoient `501 Not Implemented`. Exécutez les requêtes de `requests.http` pour observer le format uniforme des réponses.

## Contrat à respecter

| Méthode et URI | Succès | Erreurs métier |
|---|---:|---:|
| `GET /api/films` | `200` | — |
| `GET /api/films/{id}` | `200` | `400`, `404` |
| `POST /api/films` | `201` + `Location` | `400`, `422` |
| `PATCH /api/films/{id}` | `200` | `400`, `404`, `422` |
| `DELETE /api/films/{id}` | `204` | `400`, `404` |

Une erreur suit toujours ce format :

```json
{
  "erreur": {
    "code": "DONNEES_INVALIDES",
    "message": "La requête contient des données invalides.",
    "details": {"note": "La note doit être comprise entre 0 et 10."}
  }
}
```

## Mission 1 — Auditer les lectures fournies (20 min)

Lisez le code de `GET /api/films` et `GET /api/films/{id}`. Pour chaque instruction, reliez-la à une partie du contrat : validation, accès aux données, sérialisation, statut ou en-tête.

Ajoutez à la collection :

- une recherche `q` facultative ;
- une pagination `page` et `limite` ;
- un objet `meta` contenant page, limite et nombre d'éléments retournés.

Refusez une pagination incohérente avec `400`.

## Mission 2 — Créer une ressource (35 min)

Implémentez `POST /api/films` :

1. refuser un corps absent ou qui n'est pas un objet JSON avec `400` ;
2. valider `titre`, `annee` et `note` ;
3. insérer via le repository ;
4. relire la ressource créée ;
5. répondre `201`, ajouter `Location: /api/films/{id}` et renvoyer la représentation.

Ne confondez pas JSON syntaxiquement illisible (`400`) et JSON lisible ne respectant pas les règles métier (`422`).

## Mission 3 — Modifier partiellement (30 min)

Implémentez `PATCH /api/films/{id}`. Contrairement à `PUT`, seules les propriétés présentes sont modifiées. Une propriété inconnue doit être signalée. Le titre ne doit pas être effacé par omission.

Testez au minimum : modification de la note seule, film absent, objet vide, valeur hors domaine et propriété inconnue.

## Mission 4 — Supprimer et raisonner sur l'idempotence (20 min)

Implémentez `DELETE /api/films/{id}` avec le statut `204` et un corps vide. Exécutez deux fois la même requête : la première réussit, la seconde trouve une ressource absente.

Expliquez pourquoi la méthode `DELETE` peut malgré cela être qualifiée d'idempotente : l'état final du serveur est identique après une ou plusieurs demandes.

## Mission 5 — Recette boîte noire et documentation (30 min)

Échangez uniquement l'URL et `requests.http` avec un autre groupe. Le groupe testeur ne lit pas le code. Il vérifie statuts, en-têtes, corps, erreurs, cas limites et absence de fuite technique.

Complétez ensuite `CONTRAT.md` avec un exemple de requête et de réponse pour chaque opération.

## Critères de réussite

- les données sont toujours encodées par `JsonResponse` ;
- aucun endpoint d'API ne renvoie de HTML ;
- les codes `400`, `404`, `422` et `500` ne sont pas interchangeables ;
- les détails d'exception et les chemins locaux ne sont jamais exposés ;
- le repository ignore totalement HTTP et JSON ;
- la recette peut être exécutée sans lire l'implémentation.

## Défis

- produire des liens `self` dans les représentations ;
- ajouter `ETag` et gérer `If-Match` pour éviter une modification perdue ;
- documenter l'API au format OpenAPI 3.1.
