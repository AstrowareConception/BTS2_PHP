# Atelier 16 — Construire un CRUD sécurisé

**Durée : 2 h 30 — Support : données persistantes — Niveau : intermédiaire à difficile**

Vous devez ajouter l'administration des films à l'application de lecture. Le code fourni limite volontairement son aide à la validation et aux signatures du repository. Les contrôleurs, formulaires et redirections sont à construire.

## Create — 40 min

Créez un formulaire contenant titre, année, durée, note facultative, genre et résumé. Normalisez puis validez les données. Vérifiez le genre en base ou par une liste issue de la base. Insérez avec des paramètres nommés, récupérez l'identifiant, ajoutez un message flash puis redirigez vers la fiche créée.

## Update — 35 min

Validez l'identifiant, chargez le film ou répondez 404, préremplissez le formulaire, puis effectuez la mise à jour. Vérifiez qu'un titre contenant une apostrophe fonctionne. Un `UPDATE` ne doit jamais être exécuté sans `WHERE id = :id`.

## Delete — 30 min

Construisez une page de confirmation et une action POST séparée. Contrôlez le jeton CSRF et l'autorisation avant d'archiver le film. La suppression logique doit renseigner `archive_le`; le catalogue courant ne doit plus afficher la ligne.

## Sécurité — 25 min

Essayez une injection dans chaque champ, un identifiant inconnu, un genre falsifié, une action sans jeton et une action lancée par un membre non administrateur. Expliquez quelle défense arrête chaque tentative.

## Qualité — 20 min

Isolez le SQL dans `film_repository.php`. Les fonctions du repository ne lisent aucune superglobale, ne redirigent pas et ne produisent pas de HTML. Factorisez le formulaire partagé entre création et modification sans masquer le flux.

## Défis

- restauration d'un film archivé ;
- détection d'une modification concurrente avec une colonne de version ;
- filtre d'administration affichant actifs, archivés ou tous.

