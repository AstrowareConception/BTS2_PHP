# Environnement commun PDO

Cet environnement local est utilisé par les ateliers 15 à 18. Les mots de passe sont volontairement pédagogiques et ne conviennent pas à une production.

```bash
cd environnements/cineclub-pdo
docker compose up -d
docker compose ps
```

La base écoute sur le port `3307` de la machine. Le volume conserve les données entre deux démarrages. PHP ne charge pas automatiquement un fichier `.env` sans bibliothèque supplémentaire : pour ces exercices, définissez les variables dans le terminal qui lancera le serveur.

Sous Bash :

```bash
export DB_DSN='mysql:host=127.0.0.1;port=3307;dbname=cineclub;charset=utf8mb4'
export DB_USER='cineclub'
export DB_PASSWORD='cineclub_dev'
php -S localhost:8000 -t public
```

Sous PowerShell :

```powershell
$env:DB_DSN = 'mysql:host=127.0.0.1;port=3307;dbname=cineclub;charset=utf8mb4'
$env:DB_USER = 'cineclub'
$env:DB_PASSWORD = 'cineclub_dev'
php -S localhost:8000 -t public
```

Pour repartir d'une base vide et rejouer les scripts d'initialisation :

```bash
docker compose down -v
docker compose up -d
```

La commande `down -v` supprime les données locales de cet environnement. Ne l'utilisez pas sur une base contenant un travail à conserver.
