# Atelier 13 — Projet CinéClub personnel

**Durée : 3 heures — Support : PHP interactif — Niveau : synthèse**

Vous allez réaliser une mini-application sans squelette fonctionnel. Seuls le catalogue et la fiche de recette sont fournis. Vous devez choisir l'arborescence, nommer vos fonctions et construire les flux HTTP.

## Fonctionnalités obligatoires

### Catalogue public

- recherche GET par fragment de titre ;
- filtre par un ou plusieurs genres ;
- tri choisi dans une liste blanche ;
- critères conservés dans le formulaire et dans les liens ;
- état « aucun résultat » traité proprement.

### Préférences

- thème clair ou sombre dans un cookie de 30 jours ;
- valeur du cookie systématiquement validée ;
- formulaire POST suivi d'une redirection ;
- bouton de réinitialisation.

### Espace personnel

- connexion simulée parmi au moins deux utilisateurs définis côté serveur ;
- régénération de l'identifiant après connexion ;
- favoris stockés en session sous forme d'identifiants ;
- ajout et retrait exclusivement en POST ;
- message flash après chaque action.

### Sécurité

- jeton CSRF pour chaque action modifiant l'état ;
- autorisation vérifiée côté serveur ;
- listes blanches pour les choix ;
- échappement HTML de toutes les données dynamiques ;
- déconnexion complète.

## Contraintes d'architecture

Créez au minimum `data/films.php`, `functions.php`, `bootstrap.php`, des pages publiques, un dossier `actions/` et une feuille CSS. Les fonctions métier ne lisent pas directement les superglobales et ne produisent pas de HTML.

## Organisation conseillée des 3 heures

- 20 min : conception de l'arborescence et des flux ;
- 40 min : catalogue GET ;
- 25 min : cookie de préférence ;
- 45 min : connexion et favoris en session ;
- 25 min : CSRF, autorisations et déconnexion ;
- 25 min : recette, correction et compte rendu.

## Livrables

- application exécutable avec `php -S localhost:8000` ;
- `README.md` expliquant le démarrage ;
- `RECETTE.md` entièrement complété ;
- au moins cinq tests unitaires sur les fonctions métier ;
- un court paragraphe distinguant validation, autorisation et échappement.

## Extensions

- pagination conservant les filtres ;
- compteur de visites par session ;
- expiration d'inactivité ;
- page 404 commune ;
- journal d'actions ne contenant aucune donnée sensible.

