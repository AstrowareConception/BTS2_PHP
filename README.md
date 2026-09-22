# BTS SIO SLAM 2 — Exercices PHP fondamentaux

Ce dépôt accompagne le premier cours de PHP. Il propose un parcours de **16 heures de pratique** centré sur les mécanismes fondamentaux du langage : exécution d'un script, variables, types, opérateurs, conditions, boucles, tableaux, chaînes de caractères, fonctions et organisation du code.

Le parcours ne traite volontairement pas encore les formulaires, les variables superglobales, les cookies, les sessions, PDO ni les bases de données. Ces sujets appartiennent au second cours.

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

Chaque atelier contient :

- un énoncé détaillé et contextualisé ;
- des objectifs vérifiables ;
- un dossier `starter/` à compléter ;
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
- [Aide-mémoire PHP](docs/AIDE_MEMOIRE.md)

## Compétences mobilisées

Ce parcours contribue principalement à la compétence du BTS SIO option SLAM **« Concevoir et développer une solution applicative »**, notamment par l'identification et le développement de composants logiciels, l'exploitation d'un environnement de développement et de tests, la réalisation de tests, la correction de dysfonctionnements et la rédaction d'une documentation technique simple.

