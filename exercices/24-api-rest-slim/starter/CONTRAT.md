# Contrat de l'API

Complétez ce document sans recopier l'implémentation.

## Ressource film

| Propriété | Type | Obligatoire à la création | Contraintes |
|---|---|---|---|
| `id` | entier | généré | strictement positif |
| `titre` | chaîne | oui | 2 à 120 caractères |
| `annee` | entier | oui | 1895 à année courante + 2 |
| `note` | nombre | oui | 0 à 10 |

## Endpoints

Pour chacun : objectif, paramètres, exemple de requête, exemple de succès et erreurs possibles.

### `GET /api/films`

À compléter.

### `GET /api/films/{id}`

À compléter.

### `POST /api/films`

À compléter.

### `PATCH /api/films/{id}`

À compléter.

### `DELETE /api/films/{id}`

À compléter.
