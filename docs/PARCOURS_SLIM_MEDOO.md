# Passerelle vers le projet — Composer, Medoo, Slim, MVC et REST

## Pourquoi cette passerelle ?

Le passage direct d'un CRUD PDO procédural à un projet Slim complet cumule trop de nouveautés : dépendances, namespaces, objets HTTP, routeur, repository, vues et contrats JSON. Les ateliers 19 à 24 isolent ces difficultés. Chaque atelier produit un résultat visible et réutilise les acquis précédents sans demander immédiatement une architecture complète.

## Progression conseillée

| Étape | Question centrale | Compétence observable |
|---|---|---|
| 19 — Composer | Comment charger proprement les classes et bibliothèques ? | Installer, autoloader et diagnostiquer un namespace |
| 20 — Medoo | Comment réduire le code répétitif d'accès aux données sans oublier SQL ? | Construire un repository et expliquer la requête générée |
| 21 — Slim | Comment associer une méthode et une URL à un traitement ? | Déclarer une route et retourner une réponse PSR-7 |
| 22 — Slim + Medoo | Comment relier HTTP à une base sans tout mélanger ? | Valider, interroger, répondre et gérer 404/303 |
| 23 — MVC | Où placer chaque responsabilité ? | Extraire contrôleur, repository et vue d'un monolithe |
| 24 — REST | Comment offrir une interface stable à d'autres programmes ? | Concevoir un contrat JSON et utiliser les statuts HTTP |
| 25 — Projet | Comment faire cohabiter HTML et JSON sur le même métier ? | Livrer, tester, documenter et défendre une architecture |

## Règle de passage au projet

Avant l'atelier 25, l'étudiant doit savoir expliquer sans réciter :

1. pourquoi `vendor/autoload.php` est chargé une seule fois ;
2. pourquoi une route Slim retourne un objet réponse ;
3. pourquoi un repository ne connaît ni le HTML ni les statuts HTTP ;
4. pourquoi Medoo ne remplace pas la validation métier ;
5. pourquoi une vue HTML et une réponse JSON peuvent réutiliser le même service ;
6. comment distinguer une erreur de syntaxe JSON, une donnée invalide et une ressource absente.

## Références techniques

- [Composer — documentation](https://getcomposer.org/doc/)
- [Slim 4 — documentation](https://www.slimframework.com/docs/v4/)
- [Medoo — documentation](https://medoo.in/doc)
- [PHP-FIG — PSR-4](https://www.php-fig.org/psr/psr-4/)
- [MDN — méthodes HTTP](https://developer.mozilla.org/fr/docs/Web/HTTP/Reference/Methods)
- [MDN — codes de statut HTTP](https://developer.mozilla.org/fr/docs/Web/HTTP/Reference/Status)
