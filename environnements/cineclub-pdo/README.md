# Environnement commun PDO

Cet environnement local est utilisé par les ateliers 15 à 18. Les mots de passe sont volontairement pédagogiques et ne conviennent pas à une production.

```bash
cd environnements/cineclub-pdo
docker compose up -d
docker compose ps
```

La base écoute sur le port `3307` de la machine. Copiez les variables de `.env.example` dans la configuration locale de votre projet. Le volume conserve les données entre deux démarrages.

Pour repartir d'une base vide et rejouer les scripts d'initialisation :

```bash
docker compose down -v
docker compose up -d
```

La commande `down -v` supprime les données locales de cet environnement. Ne l'utilisez pas sur une base contenant un travail à conserver.

