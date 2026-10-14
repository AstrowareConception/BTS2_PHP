# Installer et vérifier l'environnement

## Pré-requis

- PHP 8.2 ou une version plus récente ;
- Composer 2 ;
- Visual Studio Code ou un autre éditeur ;
- un terminal ;
- Git pour récupérer et versionner le travail.

Les extensions `mbstring`, `pdo` et `pdo_sqlite` sont nécessaires. `curl` est recommandé pour tester les API depuis le terminal.

## Vérifications

```bash
php --version
php -m
composer --version
curl --version
```

Dans la liste affichée par `php -m`, recherchez `mbstring`, `PDO` et `pdo_sqlite`.

## Installer les dépendances d'un atelier moderne

À partir de l'atelier 19, placez-vous dans le dossier `starter/` concerné puis exécutez :

```bash
composer install
```

Le dossier `vendor/` est généré localement et ne doit pas être versionné. Le fichier `composer.lock`, lorsqu'il est présent dans votre travail, garantit que tout le groupe installe les mêmes versions.

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

Avec Slim, le document racine est le dossier `public/` :

```bash
php -S localhost:8000 -t public
```

## Si quelque chose ne fonctionne pas

1. Vérifiez le dossier courant avec `pwd` sous Linux/macOS ou `cd` sous Windows.
2. Vérifiez le nom exact du fichier.
3. Exécutez `php -l fichier.php` pour contrôler uniquement la syntaxe.
4. Lisez la première erreur affichée avant de corriger les suivantes.
5. Relancez le script après chaque correction.

