# Atelier 14 — Concevoir le modèle relationnel du CinéClub

**Durée : 1 h 45 — Support : données persistantes — Niveau : intermédiaire**

Vous devez concevoir le modèle avant d'utiliser PDO. Ne consultez le schéma de l'environnement commun qu'après avoir terminé la première partie : comparer une proposition achevée n'a d'intérêt qu'après avoir explicité vos propres choix.

## Besoin métier

Le CinéClub gère des films appartenant à un genre, des utilisateurs dotés d'un rôle, des séances possédant un nombre de places restantes et des réservations. Un utilisateur ne peut réserver qu'une fois une même séance. Un film archivé ne doit plus apparaître dans le catalogue courant.

## Mission 1 — Dictionnaire des données (20 min)

Pour chaque donnée, indiquez nom, définition, type conceptuel, caractère obligatoire et règle de validation. Distinguez clairement une année, une date complète, une note facultative et un mot de passe stocké sous forme de hash.

## Mission 2 — Modèle et contraintes (30 min)

Dessinez les entités, cardinalités et identifiants. Justifiez la table d'association ou l'entité `reservations`. Transformez ensuite le modèle en SQL dans `starter/schema.sql` avec clés primaires, étrangères, `NOT NULL`, `UNIQUE` et contrôles pertinents.

## Mission 3 — Jeu d'essai hostile (20 min)

Écrivez des insertions qui doivent réussir, puis des insertions qui doivent échouer : email dupliqué, genre absent, note supérieure à 10, seconde réservation identique, séance liée à un film inexistant. Relevez le message du SGBD et identifiez la contrainte qui a joué son rôle.

## Mission 4 — Requêtes d'analyse (25 min)

Écrivez sans PHP :

1. les films non archivés triés par titre ;
2. le nombre de films par genre, y compris un genre vide ;
3. les séances futures avec titre et places ;
4. les utilisateurs n'ayant aucune réservation ;
5. les trois films les mieux notés ;
6. le nombre total de réservations par séance.

## Restitution (10 min)

Comparez votre modèle au schéma commun. Relevez deux différences, puis expliquez si vous conservez votre choix ou adoptez l'autre.

## Défi

Ajoutez des réalisateurs et une relation plusieurs-à-plusieurs permettant à un film d'avoir plusieurs réalisateurs.

