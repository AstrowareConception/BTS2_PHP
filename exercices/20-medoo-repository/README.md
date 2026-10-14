# Atelier 20 — Construire un repository avec Medoo

**Durée : 1 h 45 — Niveau : intermédiaire — Prérequis : PDO, SQL et Composer**

Medoo fournit une API légère au-dessus de PDO. Il réduit le code répétitif des requêtes courantes, mais il ne remplace ni le modèle relationnel, ni les contraintes SQL, ni la validation métier. Vous allez construire un repository, observer le SQL produit et identifier les cas où PDO reste plus lisible.

## Mise en route (15 min)

Dans `starter/` :

```bash
composer install
php bin/init-db.php
php tests/repository_test.php
```

Le test doit d'abord échouer : les méthodes du repository sont volontairement incomplètes.

## Mission 1 — Lire et rechercher (25 min)

Complétez `tous()` et `trouver()`. La liste ne contient que les films non archivés et reste triée par titre. La recherche par identifiant renvoie `null` si la ligne n'existe pas.

Ajoutez ensuite `rechercher(string $texte)` avec l'opérateur Medoo `[~]`. Vérifiez qu'une apostrophe ou le texte `%_` ne permet pas d'injecter du SQL.

## Mission 2 — Écrire sans perdre les règles (30 min)

Implémentez :

- `ajouter(array $donnees): int` ;
- `modifierNote(int $id, float $note): bool` ;
- `archiver(int $id): bool`.

La note doit rester comprise entre 0 et 10. Le repository reçoit des données déjà validées, mais la base conserve sa contrainte `CHECK` comme seconde défense.

## Mission 3 — Voir derrière l'abstraction (20 min)

Pour trois appels Medoo, affichez la dernière requête générée avec l'outil de diagnostic adapté. Réécrivez chaque requête en SQL sur papier. Expliquez le rôle des paramètres préparés.

Utilisez ensuite `$database->pdo` pour écrire une requête d'agrégation complexe. Justifiez pourquoi le passage ponctuel à PDO est préférable à une construction Medoo illisible.

## Comparaison (15 min)

Complétez un tableau :

| Situation | Medoo ou PDO ? | Justification |
|---|---|---|
| Lecture simple filtrée |  |  |
| Insertion d'une ligne |  |  |
| Jointure avec agrégations et sous-requête |  |  |
| Transaction métier |  |  |

## Défis

- ajouter pagination et tri limité par liste blanche ;
- encapsuler une transaction avec `action()` ;
- remplacer SQLite par la base MySQL du CinéClub sans modifier le repository.
