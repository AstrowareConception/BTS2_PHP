# Recette de non-régression

À exécuter avant le refactoring, puis après chaque extraction.

| Cas | Résultat attendu |
|---|---|
| `GET /films` | statut 200, trois films classés alphabétiquement |
| `GET /films/1` | statut 200, fiche Alien |
| `GET /films/999` | statut 404 |
| `GET /films/nouveau` | formulaire complet |
| ajout valide | statut 303, redirection vers la fiche créée |
| titre d'un caractère | statut 422 |
| année 1800 | statut 422 |
| note 11 | statut 422 |

Après chaque étape, consignez : comportement testé, résultat et éventuelle régression corrigée.
