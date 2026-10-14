# Projet 25 — Médiathèque multi-interface

**Durée minimale : 5 h — Niveau : projet de synthèse — Travail en binôme recommandé**

Une médiathèque souhaite remplacer un tableur par une petite application PHP. Les bibliothécaires utilisent des pages HTML ; un futur terminal mobile consommera une API JSON. Les deux interfaces doivent partager les mêmes règles métier et la même couche de persistance.

Ce projet prépare directement la soutenance : il faut pouvoir démontrer le logiciel, expliquer son architecture, justifier les choix de sécurité et exécuter une recette devant le jury.

## Ce qui est fourni

- le schéma SQLite et un jeu de données réaliste ;
- un bootstrap Slim minimal avec deux routes de santé ;
- un contrat OpenAPI volontairement partiel ;
- une fiche d'architecture à compléter ;
- une recette fonctionnelle et technique.

Le modèle, les repositories, les contrôleurs, les vues et les règles métier ne sont pas fournis. Vous pouvez reprendre des **techniques** des ateliers précédents, mais pas fusionner leur code sans comprendre les responsabilités.

## Domaine métier

La médiathèque conserve des documents de trois types : livre, film et jeu. Un document possède éventuellement plusieurs auteurs ou créateurs. Un adhérent peut emprunter au maximum trois documents simultanément pendant 21 jours.

Règles obligatoires :

1. un exemplaire déjà emprunté ne peut pas être prêté une seconde fois ;
2. un adhérent suspendu ne peut pas emprunter ;
3. un adhérent ne peut pas dépasser trois emprunts actifs ;
4. la date d'échéance est calculée par le serveur, jamais fournie par le navigateur ;
5. un retour renseigne `retour_le` sans supprimer l'historique ;
6. la création d'un document vérifie les données propres à son type ;
7. une opération métier atomique utilise une transaction.

## Architecture attendue

```text
public/index.php
src/
├── Controller/       décisions HTTP pour le HTML
├── Api/              décisions HTTP pour le JSON
├── Domain/           objets et règles indépendants du web
├── Repository/       accès aux données avec Medoo ou PDO
├── Service/          cas d'utilisation, dont EmpruntService
└── Http/             réponses JSON et erreurs partagées
views/                gabarits HTML échappés
data/                 schéma, fixtures et base locale ignorée
tests/                tests et preuves de recette
```

Vous pouvez adapter l'arborescence, mais toute dépendance doit être justifiable. Complétez `ARCHITECTURE.md` avant le bilan final.

## Lot 1 — Socle et lecture du domaine (45 min)

```bash
cd starter
composer install
php bin/init-db.php
composer start
```

Étudiez les tables et dessinez le modèle relationnel. Identifiez : clés primaires, clés étrangères, association plusieurs-à-plusieurs et contrainte qui ne peut pas être garantie par une simple colonne.

Construisez les dépendances de l'application puis réalisez :

- `GET /documents` en HTML ;
- `GET /api/documents` en JSON ;
- filtre par type et recherche par titre ;
- statut de disponibilité calculé à partir des emprunts actifs.

Les deux interfaces utilisent le même repository ou le même service de consultation.

## Lot 2 — CRUD des documents (60 min)

Implémentez :

- page de création et traitement `POST /documents` ;
- fiche `GET /documents/{id}` ;
- modification `POST /documents/{id}/modifier` ou méthode `PUT` simulée ;
- endpoints JSON équivalents définis dans `openapi.yaml`.

Validez côté serveur. Une erreur HTML réaffiche le formulaire et les saisies ; une erreur API suit un format JSON stable. Une création réussie produit une redirection `303` en HTML et un statut `201` avec `Location` en JSON.

## Lot 3 — Cas d'utilisation « emprunter » (75 min)

Créez `EmpruntService`. Il reçoit un adhérent, un document et la date courante. Il vérifie toutes les règles avant d'enregistrer l'emprunt et son échéance.

L'opération doit être transactionnelle : entre la vérification de disponibilité et l'insertion, aucune étape intermédiaire ne doit rester validée en cas d'échec. Testez les cinq scénarios de la section « emprunts » de `RECETTE.md`.

Ajoutez :

- un formulaire HTML d'emprunt depuis la fiche ;
- `POST /api/emprunts` ;
- le retour HTML et `PATCH /api/emprunts/{id}/retour` ;
- une page listant les retards.

## Lot 4 — Qualité HTTP et sécurité (45 min)

- activez les sessions uniquement pour l'interface web ;
- protégez les formulaires d'écriture par un jeton CSRF ;
- échappez toutes les sorties HTML ;
- ne renvoyez aucune trace technique en production ;
- utilisez requêtes préparées/Medoo et listes blanches pour les tris ;
- distinguez authentification, autorisation, validation et échappement.

Ajoutez au minimum un middleware utile : identifiant de requête, durée, en-tête de sécurité ou protection d'une zone de gestion.

## Lot 5 — Recette, documentation et soutenance (75 min)

1. Complétez `openapi.yaml` et `ARCHITECTURE.md`.
2. Exécutez toute la recette et conservez les preuves utiles.
3. Ajoutez au moins trois tests automatisés sur `EmpruntService`.
4. Préparez un jeu de données de démonstration reproductible.
5. Répétez une présentation de cinq minutes suivie d'une modification en direct.

Votre démonstration doit raconter un scénario, pas visiter des fichiers : recherche d'un document, emprunt, refus explicable, retour, vérification par l'API.

## Définition de terminé

- l'installation fonctionne à partir d'un clone propre ;
- HTML et JSON partagent réellement les règles métier ;
- les statuts HTTP et redirections respectent le contrat ;
- les erreurs sont utiles sans divulguer l'implémentation ;
- la base conserve son intégrité après un scénario invalide ;
- un autre binôme peut exécuter la recette sans aide orale ;
- chaque membre peut expliquer le trajet complet d'une requête.

## Extensions facultatives

- authentification et rôles bibliothécaire/adhérent ;
- pagination avec liens `prev` et `next` ;
- réservation d'un document indisponible ;
- historique et statistiques ;
- tests d'intégration HTTP ;
- conteneur d'injection de dépendances et configuration par environnement.
