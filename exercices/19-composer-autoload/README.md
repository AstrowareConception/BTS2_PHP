# Atelier 19 — Composer et autoloading PSR-4

**Durée : 1 h 15 — Niveau : découverte guidée — Prérequis : fonctions, classes simples et terminal**

Jusqu'ici, les projets chargeaient leurs fichiers avec plusieurs `require`. Vous allez installer les dépendances d'un projet avec Composer et configurer l'autoloading PSR-4 afin que PHP retrouve automatiquement les classes de `src/`.

## Mission 1 — Lire le manifeste (15 min)

Ouvrez `starter/composer.json` et repérez :

- la version minimale de PHP ;
- le namespace `App\` ;
- le dossier auquel il correspond ;
- la différence entre `require` et `autoload`.

Avant d'exécuter une commande, prédisez quels fichiers Composer va créer.

## Mission 2 — Installer et observer (15 min)

Dans `starter/`, exécutez :

```bash
composer install
composer dump-autoload
```

Repérez `vendor/autoload.php`, `vendor/composer/autoload_psr4.php` et `composer.lock`. N'éditez jamais les fichiers du dossier `vendor/`.

## Mission 3 — Terminer le domaine (20 min)

Complétez `App\Domain\Film::description()` pour produire exactement `Alien (1979)`. Ajoutez ensuite une classe `Duree` dans `src/Domain/` qui transforme 117 minutes en `1 h 57`.

Lancez :

```bash
php tests/autoload_test.php
php -S localhost:8000 -t public
```

## Mission 4 — Laboratoire des pannes (15 min)

Provoquez puis diagnostiquez successivement :

1. un namespace mal orthographié ;
2. une différence de casse entre classe et fichier ;
3. un fichier déplacé hors de `src/` ;
4. l'oubli de `composer dump-autoload` après une modification de configuration.

Pour chaque panne, notez le message, la cause et la correction.

## Restitution (10 min)

Expliquez en six lignes pourquoi `vendor/autoload.php` doit être chargé au point d'entrée et non répété dans chaque classe.

## Défi

Ajoutez un script Composer `start` permettant de lancer le serveur avec `composer start`, puis expliquez la différence entre un script Composer et une dépendance.
