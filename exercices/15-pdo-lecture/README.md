# Atelier 15 — Lire la base avec PDO

**Durée : 2 heures — Support : données persistantes — Niveau : intermédiaire**

L'environnement commun fournit la base. Le code fourni contient les signatures et la configuration, mais aucune requête fonctionnelle. Votre objectif est de construire une couche de lecture réutilisable, puis de l'exposer dans plusieurs pages.

## Étape 1 — Connexion observable (20 min)

Complétez `database.php` avec les variables d'environnement, `utf8mb4`, le mode exception, `FETCH_ASSOC` et les préparations natives. Provoquez volontairement une erreur de nom de base, journalisez le détail et affichez un message neutre à l'utilisateur.

## Étape 2 — Repository de lecture (40 min)

Implémentez les fonctions suivantes : liste non archivée avec genre, recherche par identifiant, recherche par fragment de titre, statistiques par genre et pagination. Utilisez `query` uniquement lorsque le SQL ne varie pas ; utilisez des requêtes préparées pour toutes les valeurs.

## Étape 3 — Pages web (35 min)

Créez `index.php` et `film.php`. La liste conserve les critères GET et fournit une navigation paginée. La fiche valide l'identifiant et répond 404 si nécessaire. Toute donnée insérée dans le HTML est échappée.

## Étape 4 — Observer les coûts (15 min)

Construisez d'abord une version N+1 qui recherche le genre de chaque film, mesurez le nombre de requêtes, puis remplacez-la par une jointure. Expliquez la différence dans `COMPTE_RENDU.md`.

## Recette (10 min)

Testez catalogue vide, identifiant absent, identifiant non numérique, recherche sans résultat, page négative et page trop élevée.

## Défis

- tri dynamique limité à trois colonnes autorisées ;
- liens de pagination conservant recherche et tri ;
- fonction génératrice parcourant un grand résultat sans `fetchAll`.

