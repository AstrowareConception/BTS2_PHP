# Installer et vérifier l'environnement

## Pré-requis

- PHP 8.1 ou une version plus récente ;
- Visual Studio Code ou un autre éditeur ;
- un terminal ;
- Git pour récupérer et versionner le travail.

L'extension `mbstring` est recommandée, car plusieurs exercices manipulent des textes accentués.

## Vérifications

```bash
php --version
php -m
```

Dans la liste affichée par `php -m`, recherchez `mbstring`.

## Deux manières d'exécuter PHP

### Dans le terminal

```bash
php chemin/vers/script.php
```

Cette méthode convient aux calculs, aux algorithmes et aux tests.

### Dans le navigateur

```bash
cd chemin/vers/projet
php -S localhost:8000
```

Le terminal doit rester ouvert. L'adresse <http://localhost:8000> permet ensuite de consulter le projet. Le navigateur ne reçoit jamais le code PHP : il reçoit le résultat produit, généralement du HTML.

## Si quelque chose ne fonctionne pas

1. Vérifiez le dossier courant avec `pwd` sous Linux/macOS ou `cd` sous Windows.
2. Vérifiez le nom exact du fichier.
3. Exécutez `php -l fichier.php` pour contrôler uniquement la syntaxe.
4. Lisez la première erreur affichée avant de corriger les suivantes.
5. Relancez le script après chaque correction.

