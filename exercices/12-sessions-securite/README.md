# Atelier 12 — Sessions, favoris et sécurité

**Durée : 2 h 15 — Support : PHP interactif — Niveau : intermédiaire à difficile**

Le dossier `starter/` contient plusieurs fonctions incomplètes. Vous construirez d'abord un système de favoris, puis un message flash, une connexion simulée et une protection CSRF. Les données utilisateurs restent fictives : l'objectif porte sur le mécanisme de session.

## Étape 1 — Favoris idempotents (30 min)

Complétez `ajouterFavori` et `retirerFavori`. Ajouter deux fois le même identifiant ne crée pas de doublon. Retirer un identifiant absent ne provoque aucune erreur. Les identifiants inférieurs à 1 sont ignorés.

## Étape 2 — Messages flash (20 min)

`definirFlash` enregistre un message et son type. `consommerFlash` retourne ce message une seule fois puis le supprime. Réalisez un cycle POST, redirection, GET et prouvez qu'un deuxième GET n'affiche plus le message.

## Étape 3 — Connexion simulée (25 min)

À partir d'un tableau d'utilisateurs fourni par vos soins, validez un couple email/mot de passe fictif, appelez `session_regenerate_id(true)` après succès et enregistrez uniquement l'identifiant de l'utilisateur. Protégez `favoris.php` côté serveur.

## Étape 4 — Jeton CSRF (35 min)

Complétez `obtenirJetonCsrf` avec `random_bytes`, insérez le jeton dans chaque formulaire d'action et contrôlez-le avec `hash_equals`. Une absence ou une différence doit produire un refus 403. Régénérez le jeton après connexion.

## Étape 5 — Audit du code vulnérable (25 min)

Le fichier `vulnerable.php.txt` contient huit défauts. Relevez-les, classez leur risque et proposez une correction : démarrage tardif de session, identifiant imposé, absence de validation, action GET, absence de CSRF, confiance dans un rôle client, sortie non échappée et déconnexion incomplète.

## Défi

Ajoutez une expiration d'inactivité de 20 minutes et expliquez la différence entre expiration de la session serveur et durée du cookie de session.

