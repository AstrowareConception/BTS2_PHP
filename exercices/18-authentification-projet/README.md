# Atelier 18 — Authentification et projet final persistant

**Durée : 3 heures — Support : données persistantes — Niveau : synthèse**

Cette réalisation clôt les trois cours PHP. Vous devez intégrer comptes utilisateurs, sessions et base de données sans perdre les défenses construites dans les ateliers précédents. Les signatures fournies n'imposent pas toute l'architecture : vous restez responsable du flux.

## Partie 1 — Inscription (35 min)

- normaliser et valider l'email ;
- exiger un mot de passe d'au moins 12 caractères et une confirmation identique ;
- rechercher un éventuel doublon sans révéler de détail technique ;
- créer le hash avec `password_hash(PASSWORD_DEFAULT)` ;
- insérer avec une requête préparée ;
- ne jamais journaliser le mot de passe.

## Partie 2 — Connexion et déconnexion (35 min)

- retrouver le compte par email ;
- utiliser `password_verify` ;
- présenter le même message si email ou mot de passe est incorrect ;
- régénérer l'identifiant de session après succès ;
- stocker seulement l'identifiant utilisateur ;
- vider et détruire complètement la session à la déconnexion.

## Partie 3 — Autorisations (30 min)

Les membres consultent le catalogue et gèrent leurs réservations. Les administrateurs gèrent les films. Chaque contrôleur sensible vérifie le rôle relu depuis la base. Modifier un cookie, l'URL ou un champ caché ne doit accorder aucun droit.

## Partie 4 — Intégration fonctionnelle (40 min)

Intégrez au moins : catalogue PDO, fiche film, favoris ou réservations en base, CRUD administrateur, messages flash, jetons CSRF et pages 403/404. Utilisez Post/Redirect/Get après toutes les écritures.

## Partie 5 — Audit croisé (25 min)

Échangez votre application avec un autre binôme. Sans modifier sa base, tentez : injection SQL, XSS stockée, CSRF, accès horizontal à la réservation d'un autre membre, élévation de rôle, identifiant invalide, double soumission et fuite d'exception. Notez preuve, gravité et correction proposée.

## Partie 6 — Corrections et bilan (15 min)

Corrigez au moins les anomalies critiques ou importantes. Documentez les risques résiduels et ce qui nécessiterait un framework ou une infrastructure de production.

## Livrables

- application et scripts SQL de démarrage ;
- `.env.example` sans secret réel ;
- guide de lancement ;
- `AUDIT.md` complété ;
- tests des fonctions de validation et d'autorisation ;
- preuve d'une requête préparée, d'une transaction et d'un mot de passe haché.

## Défis

- `password_needs_rehash` après connexion ;
- limitation des tentatives de connexion ;
- expiration d'inactivité ;
- journal d'audit des actions administratives ;
- politique de mot de passe argumentée plutôt qu'une accumulation arbitraire de règles.

