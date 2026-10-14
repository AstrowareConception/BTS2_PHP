# Atelier 22 — Un catalogue web avec Slim et Medoo

**Durée : 2 h — Niveau : intermédiaire — Prérequis : ateliers 20 et 21**

Vous reprenez le catalogue de films sous la forme d'une petite application web. Slim reçoit la requête et fabrique la réponse ; Medoo dialogue avec SQLite. Le but est de faire circuler une donnée de bout en bout sans encore introduire MVC.

## Mise en route (15 min)

```bash
cd starter
composer install
php bin/init-db.php
composer start
```

La page d'accueil explique l'état du starter. Les méthodes du repository et les trois routes métier restent à compléter.

## Mission 1 — Le repository (25 min)

Complétez `FilmRepository` :

- `tous()` retourne les films non archivés, triés par titre ;
- `trouver($id)` retourne un film ou `null` ;
- `rechercher($texte)` cherche sans tenir compte de la casse dans le titre ;
- `ajouter($donnees)` insère puis retourne l'identifiant créé.

Interdiction d'accéder directement à Medoo depuis une route : toutes les requêtes passent par le repository.

## Mission 2 — Lister et rechercher (25 min)

Implémentez `GET /films`. La query string facultative `q` déclenche la recherche. Produisez une page HTML valide avec :

- le formulaire de recherche ;
- le nombre de résultats ;
- un lien vers chaque fiche ;
- un message utile si la liste est vide.

Échappez chaque valeur issue de la base avec `htmlspecialchars`. Expliquez pourquoi les requêtes préparées ne protègent pas d'une injection HTML.

## Mission 3 — Afficher une ressource (20 min)

Implémentez `GET /films/{id}` :

- statut `200` et fiche HTML si le film existe ;
- statut `400` si l'identifiant est mal formé ;
- statut `404` si l'identifiant est valide mais absent.

Ces deux erreurs ne racontent pas la même chose : ajoutez une phrase qui explique cette différence dans votre compte rendu.

## Mission 4 — Créer un film (25 min)

Implémentez `POST /films`. Validez `titre`, `annee` et `note` :

- titre non vide et long de 2 à 120 caractères ;
- année comprise entre 1895 et l'année courante + 2 ;
- note comprise entre 0 et 10.

En cas d'erreur, réaffichez le formulaire avec les valeurs saisies et un statut `422`. En cas de succès, redirigez vers `/films/{nouvelId}` avec le statut `303 See Other`.

## Mission 5 — Recette croisée (35 min)

Travaillez par binômes. L'étudiant A exécute `tests/RECETTE.md` sur l'application de B, puis inversement. Chaque anomalie doit contenir : requête, résultat obtenu, résultat attendu, hypothèse et correction.

## Contraintes d'architecture

- `public/index.php` peut orchestrer, mais ne contient aucune requête SQL ;
- le repository ne connaît ni HTML ni objet PSR-7 ;
- la connexion est créée une seule fois ;
- les erreurs utilisateur n'affichent aucune trace PHP.

## Défis

- ajouter pagination et tri via une liste blanche ;
- protéger l'ajout par un jeton CSRF en session ;
- remplacer le HTML construit dans les routes par des fichiers de vues réutilisables.
