# BTS SIO SLAM 2 — Parcours complet PHP

Ce dépôt accompagne la progression complète de PHP en deuxième année : fondamentaux, HTTP, formulaires, sessions, PDO, Composer, Medoo, Slim 4, MVC et API REST. Il propose désormais **54 heures de pratique**, dont une passerelle progressive de 16 h 15 entre le CRUD PDO et un véritable projet Slim.

Les ateliers 00 à 08 couvrent les fondamentaux. Les ateliers 09 à 13 correspondent au support *PHP interactif : formulaires, superglobales, cookies et sessions*. Les ateliers 14 à 18 accompagnent *PHP et les données persistantes*. Les ateliers 19 à 25 construisent la transition vers Composer, Medoo, Slim 4, MVC et REST.

## Le parcours de 16 heures

| Atelier | Sujet | Durée indicative | Difficulté dominante |
|---|---|---:|---|
| 00 | Premiers scripts et chasse aux erreurs | 1 h | Découverte |
| 01 | Variables, types et calculs | 1 h 30 | Facile à intermédiaire |
| 02 | Conditions et logique | 1 h 30 | Intermédiaire |
| 03 | Boucles et raisonnements itératifs | 2 h | Intermédiaire |
| 04 | Tableaux et textes | 2 h | Intermédiaire |
| 05 | Algorithmes classiques | 2 h | Intermédiaire à difficile |
| 06 | Fonctions, contrats et tests | 2 h | Intermédiaire à difficile |
| 07 | Récursivité | 1 h 30 | Difficile |
| 08 | Projet final : le Musée des algorithmes | 2 h 30 | Synthèse |
|  | **Total** | **16 h** |  |

## Parcours PHP interactif — 10 h 30

| Atelier | Sujet | Durée indicative | Dispositif |
|---|---|---:|---|
| 09 | Enquête HTTP et superglobales | 1 h 30 | Exploration et code guidé |
| 10 | Formulaire robuste | 2 h 15 | Starter incomplet et tests |
| 11 | Cookies et préférences | 1 h 30 | Construction semi-guidée |
| 12 | Sessions, favoris et sécurité | 2 h 15 | Code à réparer puis enrichir |
| 13 | Projet CinéClub personnel | 3 h | Cahier des charges, peu de code fourni |
|  | **Total** | **10 h 30** |  |

## Parcours PDO et persistance — 11 h 15

| Atelier | Sujet | Durée indicative | Dispositif |
|---|---|---:|---|
| 14 | Modèle relationnel et SQL | 1 h 45 | Modélisation et scripts SQL |
| 15 | Lecture avec PDO | 2 h | Repository partiellement fourni |
| 16 | CRUD sécurisé | 2 h 30 | Application à compléter |
| 17 | Transactions et concurrence | 2 h | Incident à diagnostiquer |
| 18 | Authentification et projet final | 3 h | Réalisation autonome et audit |
|  | **Total** | **11 h 15** |  |

## Passerelle Composer, Medoo, Slim et MVC — 16 h 15

| Atelier | Sujet | Durée indicative | Dispositif |
|---|---|---:|---|
| 19 | Composer et autoloading PSR-4 | 1 h 15 | Manipulation guidée et diagnostic |
| 20 | Premiers repositories avec Medoo | 1 h 45 | API à compléter et comparaison avec PDO |
| 21 | Routage et réponses avec Slim 4 | 1 h 30 | Micro-défis HTTP indépendants |
| 22 | Catalogue Slim + Medoo | 2 h | Application semi-guidée |
| 23 | Séparer le code selon MVC | 2 h 15 | Refactoring d'un monolithe fourni |
| 24 | Première API REST avec Slim | 2 h 30 | Contrat, JSON, statuts et recette `curl` |
| 25 | Projet final : Médiathèque multi-interface | 5 h | Réalisation autonome, peu de code fourni |
|  | **Total** | **16 h 15** |  |

Selon le dispositif pédagogique, les ateliers proposent :

- un énoncé détaillé et contextualisé ;
- des objectifs vérifiables ;
- un dossier `starter/` à compléter ou, pour les projets autonomes, seulement les données et critères de recette ;
- des exemples d'entrées et de sorties ;
- des tests automatisés pour les exercices qui s'y prêtent ;
- un ou plusieurs défis facultatifs pour aller plus loin.

## Démarrage rapide

Vérifiez d'abord l'installation de PHP :

```bash
php --version
```

Exécutez un script dans le terminal :

```bash
php exercices/01-variables-calculs/starter/duree_film.php
```

Lancez un test précis :

```bash
php exercices/05-algorithmes-classiques/tests/fibonacci_test.php
```

Lancez l'ensemble des tests disponibles :

```bash
php bin/test.php
```

Pour afficher une page dans le navigateur, placez-vous dans son dossier puis démarrez le serveur intégré :

```bash
cd exercices/08-projet-musee/starter
php -S localhost:8000
```

Ouvrez ensuite <http://localhost:8000>.

À partir de l'atelier 19, Composer gère les dépendances et l'autoloading. Exécutez `composer install` dans le dossier `starter/` de l'atelier concerné avant le premier lancement.

## Règles de travail

1. Lire l'énoncé complet avant de coder.
2. Écrire quelques exemples à la main avant de chercher une formule.
3. Modifier une seule chose à la fois, puis exécuter immédiatement le programme.
4. Lire les messages d'erreur du début à la fin.
5. Conserver les types adaptés : un prix reste un nombre, une disponibilité reste un booléen.
6. Séparer les données, les traitements et l'affichage dès que l'énoncé le demande.
7. Ne pas chercher une correction prête à copier : les tests indiquent le résultat attendu, pas la démarche.

## Repères pour l'étudiant

- [Installer et vérifier l'environnement](docs/ENVIRONNEMENT.md)
- [Méthode de résolution et de débogage](docs/METHODE.md)
- [Plan détaillé des 16 heures](docs/PLAN_16H.md)
- [Plan des parcours complémentaires](docs/PLAN_COMPLEMENTS_21H45.md)
- [Passerelle Composer, Medoo, Slim, MVC et REST](docs/PARCOURS_SLIM_MEDOO.md)
- [Aide-mémoire PHP](docs/AIDE_MEMOIRE.md)

## Compétences mobilisées

Ces parcours contribuent principalement à la compétence du BTS SIO option SLAM **« Concevoir et développer une solution applicative »**, notamment par l'identification et le développement de composants logiciels, l'utilisation de composants d'accès aux données, l'exploitation d'un environnement de développement et de tests, la réalisation de tests, la correction de dysfonctionnements et la rédaction d'une documentation technique simple.
