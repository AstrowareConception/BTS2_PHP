# Atelier 23 — Refactoriser un monolithe vers MVC

**Durée : 2 h 15 — Niveau : intermédiaire à difficile — Prérequis : Slim, Medoo et POO**

Le starter fonctionne, mais tout est concentré dans `public/index.php` : connexion, requêtes, validation, HTML et règles HTTP. Cette dette technique est volontaire. Votre mission n'est pas d'ajouter beaucoup de fonctionnalités, mais de modifier l'organisation sans modifier le comportement observable.

> Refactoriser signifie améliorer la structure interne d'un programme en conservant ses fonctionnalités. Un changement à la fois, suivi d'un test, est plus sûr qu'une réécriture globale.

## Mise en route et état de référence (20 min)

```bash
cd starter
composer install
php bin/init-db.php
composer start
```

Exécutez toute la recette de `tests/RECETTE.md`. Conservez le résultat comme référence. Lancez aussi `php tests/architecture_test.php` : ce test échoue tant que les composants attendus n'existent pas.

## Mission 1 — Faire l'inventaire des responsabilités (15 min)

Annotez le monolithe avec cinq couleurs :

- infrastructure et connexion ;
- accès aux données ;
- règles de validation ;
- décision HTTP ;
- génération HTML.

Repérez au moins trois raisons de changement différentes dans le fichier. C'est l'indice qu'il possède trop de responsabilités.

## Mission 2 — Extraire le modèle et le repository (30 min)

Créez :

```text
src/
├── Database.php
├── Domain/Film.php
└── Repository/FilmRepository.php
```

Le repository contient uniquement les opérations de persistance. Le contrôleur ne doit plus connaître les noms des tables ou la syntaxe Medoo. Décidez si `FilmRepository` retourne des tableaux ou des objets `Film`, puis justifiez ce choix.

Relancez la recette avant de continuer.

## Mission 3 — Extraire les règles et les vues (30 min)

Créez `Service/FilmValidator.php`. Sa méthode de validation ne connaît ni Slim, ni HTML, ni Medoo : elle reçoit des données et retourne un tableau d'erreurs.

Déplacez ensuite le HTML dans `views/`. Une fonction ou une petite classe `View` reçoit un nom de vue et des données. Toutes les sorties dynamiques doivent être échappées au moment de l'affichage.

Relancez la recette. Une page visuellement identique et des statuts inchangés constituent une réussite.

## Mission 4 — Introduire le contrôleur (30 min)

Créez `Controller/FilmController.php` avec trois actions :

- `index()` pour la liste ;
- `show()` pour une fiche ;
- `store()` pour la création.

Le contrôleur orchestre : il lit la requête, appelle la validation et le repository, choisit la vue ou la redirection. Il ne contient ni SQL, ni configuration de connexion, ni longue chaîne HTML.

Réduisez `public/index.php` à quatre rôles : chargement, construction des dépendances, déclaration des routes, lancement de l'application.

## Mission 5 — Vérification et défense orale (20 min)

Faites passer `architecture_test.php`, puis la recette complète. Préparez une explication orale de deux minutes :

1. trajet d'une requête `GET /films/1` ;
2. responsabilité de chaque couche ;
3. dépendances entre les objets ;
4. changement qui serait désormais facile à réaliser.

## Contraintes mesurables

- aucune classe ne lit directement `$_GET` ou `$_POST` ;
- seule la couche repository utilise Medoo ;
- les vues ne lancent aucune requête ;
- le domaine ne dépend pas de Slim ;
- `public/index.php` reste sous 60 lignes hors commentaires ;
- la recette fonctionnelle reste verte après chaque extraction.

## Défis

- définir des interfaces pour le repository et la vue afin de tester le contrôleur avec des doublures ;
- utiliser un conteneur d'injection de dépendances ;
- ajouter une gestion centralisée des erreurs 404 et 500.
