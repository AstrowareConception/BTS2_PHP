# Parcours complémentaires — 38 heures

## Principes pédagogiques

Les ateliers ne sont pas dix variantes du même exercice. Ils alternent observation du protocole, écriture guidée, code à réparer, tests à faire passer, construction sans squelette et audit de sécurité. Chaque atelier possède un socle obligatoire et des extensions destinées aux étudiants les plus rapides.

Les durées incluent la lecture, la conception sur papier, le développement, les tests et une courte restitution. Les défis ne sont pas nécessaires pour atteindre la durée annoncée.

## Support 2 — PHP interactif (10 h 30)

| Atelier | Socle | Production attendue |
|---|---:|---|
| 09 — Enquête HTTP | 1 h 30 | rapport d'observation et catalogue filtrable par GET |
| 10 — Formulaire robuste | 2 h 15 | formulaire validé, réaffiché et redirigé |
| 11 — Cookies | 1 h 30 | préférences persistantes contrôlées côté serveur |
| 12 — Sessions | 2 h 15 | favoris, messages flash, connexion simulée et CSRF |
| 13 — CinéClub personnel | 3 h | mini-application complète réalisée avec peu de code fourni |

## Support 3 — PDO et données persistantes (11 h 15)

| Atelier | Socle | Production attendue |
|---|---:|---|
| 14 — Modèle relationnel | 1 h 45 | schéma SQL, contraintes et requêtes d'analyse |
| 15 — Lecture PDO | 2 h | liste, détail, recherche et pagination |
| 16 — CRUD | 2 h 30 | création, modification et suppression sécurisées |
| 17 — Transactions | 2 h | réservation atomique et expérience de concurrence |
| 18 — Authentification | 3 h | comptes, connexion, autorisations et audit final |

L'atelier 18 clôt le bloc PDO, mais il ne constitue plus la fin du parcours PHP. Il fournit le socle métier et les réflexes de sécurité réutilisés dans les ateliers Slim.

## Passerelle vers le projet — Composer, Medoo, Slim et MVC (16 h 15)

| Atelier | Socle | Production attendue |
|---|---:|---|
| 19 — Composer et PSR-4 | 1 h 15 | projet installable, classes autoloadées et diagnostic de namespaces |
| 20 — Medoo | 1 h 45 | repository de lecture et d'écriture, comparaison argumentée avec PDO |
| 21 — Slim 4 | 1 h 30 | routes GET/POST, paramètres, réponses HTML et JSON |
| 22 — Slim + Medoo | 2 h | catalogue filtrable, fiche 404 et création sécurisée |
| 23 — MVC | 2 h 15 | monolithe séparé en contrôleur, repository et vues |
| 24 — REST | 2 h 30 | API JSON de niveau 2, statuts cohérents et recette `curl` |
| 25 — Projet Médiathèque | 5 h | application MVC et API partageant le même métier et le même repository |

## Modalités d'utilisation

- Les dossiers `starter/` contiennent uniquement ce qui sert réellement de point de départ.
- Lorsqu'un atelier précise « à créer », l'absence de squelette fait partie de l'exercice.
- Les tests publics décrivent des contrats essentiels, sans couvrir toute la recette.
- Les étudiants doivent compléter les fichiers `COMPTE_RENDU.md` ou `RECETTE.md` lorsqu'ils sont présents.
- Une réussite technique sans explication des choix ne suffit pas pour les ateliers d'audit et de diagnostic.
- Les ateliers 19 à 24 restent courts et focalisés : chacun introduit une difficulté principale avant le projet autonome.
- L'atelier 25 doit commencer seulement lorsque les routes Slim, l'injection manuelle des dépendances et le rôle du repository sont compris.
