# Recette du projet Médiathèque

## Catalogue

- [ ] la liste HTML et la liste JSON contiennent les mêmes documents ;
- [ ] la recherche ignore les espaces périphériques ;
- [ ] le filtre refuse un type inconnu ;
- [ ] les documents indisponibles sont identifiables ;
- [ ] un titre contenant du HTML est affiché comme du texte.

## CRUD

- [ ] une création HTML réussie produit une redirection 303 ;
- [ ] une création API réussie produit 201 et `Location` ;
- [ ] une erreur de validation HTML conserve les saisies ;
- [ ] une erreur API suit le format documenté ;
- [ ] une ressource absente produit 404.

## Emprunts

- [ ] un adhérent actif peut emprunter un document disponible ;
- [ ] un document déjà emprunté est refusé ;
- [ ] un adhérent suspendu est refusé ;
- [ ] un quatrième emprunt actif est refusé ;
- [ ] l'échéance est exactement 21 jours après l'emprunt ;
- [ ] un retour conserve l'historique et rend le document disponible ;
- [ ] un échec ne laisse aucune écriture partielle.

## HTTP et sécurité

- [ ] les formulaires d'écriture exigent un jeton CSRF valide ;
- [ ] l'API ne renvoie jamais de HTML ;
- [ ] une erreur serveur ne divulgue ni chemin local ni trace ;
- [ ] les routes protégées refusent un utilisateur non autorisé ;
- [ ] les tris et filtres ne permettent aucune injection.

## Installation et soutenance

- [ ] un clone propre est installable avec les commandes documentées ;
- [ ] le jeu de démonstration est reproductible ;
- [ ] les tests automatisés passent ;
- [ ] chaque membre sait expliquer une requête de bout en bout.
