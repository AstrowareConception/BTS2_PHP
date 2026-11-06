# Atelier 26 — Sécuriser une API Slim 4 avec JWT

**Durée indicative : 4 heures — Niveau : intermédiaire à difficile — Support : Sécuriser une API REST (JWT et Slim 4)**

**Prérequis :** PHP orienté objet, PDO, `password_verify()`, Composer, Slim 4, middleware, JSON, codes HTTP 200/400/401/403/404/415/422 et requêtes `curl`.

## Mission professionnelle

Une petite médiathèque possède désormais une API REST. Son catalogue public est consultable par tous, mais les fiches privées des utilisateurs ne doivent être accessibles qu'après connexion. Aujourd'hui, aucune preuve d'identité n'accompagne les appels : un utilisateur pourrait accéder à des informations ne lui appartenant pas.

Vous devez faire évoluer un **starter volontairement incomplet**, sans mettre en place de session PHP : la connexion renvoie un **JWT signé**, puis le client présente ce jeton dans l'en-tête `Authorization: Bearer ...` pour accéder aux routes protégées.

Le projet est **autonome** : il s'appuie sur les acquis des ateliers 18, 21, 24 et 25, mais n'exige pas d'avoir terminé votre propre projet 25.

## Ce qui est fourni

- une application Slim 4 et un endpoint public `GET /api/etat` fonctionnel ;
- une base SQLite initialisable avec trois comptes et deux notes privées ;
- un `CompteRepository` opérationnel, qui centralise les requêtes préparées ;
- un helper de réponses JSON ;
- un squelette `JetonJwt`, un middleware et des routes volontairement incomplètes ;
- un fichier `requests.http` et une recette automatisée pour observer les résultats.

**Attention :** `501 NON_IMPLEMENTE` est volontaire dans le starter. Il signifie que vous devez réaliser le traitement. Le middleware initial **refuse tout passage** : aucune route privée n'est exposée par inadvertance.

## Installation — 15 min

Prérequis : PHP ≥ 8.2, Composer et l'extension `pdo_sqlite`.

```bash
cd exercices/26-authentification-jwt-slim/starter
composer install
php bin/init-db.php
```

Générez un secret de démonstration local (64 caractères hexadécimaux) :

```bash
php -r "echo bin2hex(random_bytes(32)), PHP_EOL;"
```

Recopiez la valeur **dans la variable d'environnement du terminal**, et **ne la commitez jamais** :

- PowerShell : `$env:JWT_SECRET = "valeur_generee"`
- Bash : `export JWT_SECRET="valeur_generee"`
- CMD Windows : `set JWT_SECRET=valeur_generee`

Démarrez ensuite le serveur **dans ce même terminal** :

```bash
composer start
```

Dans un second terminal, vérifiez :

```bash
curl -i http://localhost:8000/api/etat
```

Vous devez recevoir **200** avec `{"statut":"ok"}`. Si `JWT_SECRET` manque ou est trop courte, le démarrage échoue volontairement : c'est une protection, pas un bogue.

**Comptes de démonstration, uniquement pour cet atelier :**

| Adresse | Mot de passe local | Rôle | Note privée |
|---|---|---|---|
| `alice@example.test` | `BtsJwt2026!` | `lecteur` | note 1 |
| `bob@example.test` | `BtsJwt2026!` | `lecteur` | note 2 |
| `admin@example.test` | `BtsJwt2026!` | `admin` | aucune |

Les mots de passe sont **hachés** dans SQLite par `password_hash()` lors de l'initialisation. Le secret JWT **n'est pas** le mot de passe d'un compte.

## Contrat HTTP à réaliser

| Requête | Résultat nominal | Autres résultats |
|---|---|---|
| `GET /api/etat` | 200 — route publique | — |
| `POST /api/login` | 200 — `{"token":"...","token_type":"Bearer","expires_in":900}` | 400 JSON mal formé ; 415 média incorrect ; 422 champs invalides ; 401 identifiants incorrects |
| `GET /api/profil` | 200 — `id`, `email` et `role` du compte authentifié | 401 jeton absent, invalide ou expiré |
| `GET /api/notes/{id}` | 200 — note appartenant au compte authentifié | 400 identifiant incorrect ; 401 non authentifié ; 403 note d'autrui ; 404 note inexistante |
| `GET /api/admin/statistiques` (défi) | 200 — nombre de comptes et de notes | 401 non authentifié ; 403 rôle non autorisé |

Toutes les erreurs applicatives sont des **JSON sans détails techniques** ; la réponse ne doit contenir ni trace PHP ni secret. Pour 401 sur une route privée, ajoutez `WWW-Authenticate: Bearer`.

## Mission 1 — Relire le scénario et le modèle de confiance (20 min)

Sur papier ou dans `RECETTE.md`, retracez le dialogue :

1. le client envoie un courriel et un mot de passe à `POST /api/login` ;
2. le serveur consulte la base et vérifie `password_verify()` ;
3. le serveur émet un JWT signé avec une durée de vie limitée ;
4. le client transmet `Authorization: Bearer <token>` ;
5. le middleware vérifie la signature et les claims ;
6. la route contrôle **en plus** le droit d'accéder à la note demandée.

Répondez : pourquoi le serveur doit-il vérifier le JWT à **chaque** requête privée ? Pourquoi un jeton lisible n'est-il pas nécessairement faux ? Où réside le droit réel de consulter la note 2 ?

## Mission 2 — Construire la connexion (35 min)

Complétez `POST /api/login` dans `public/index.php` :

- lire un **objet JSON** ; refuser un format de corps non pris en charge avec **415**, un JSON mal formé ou un tableau avec **400** ;
- vérifier que `email` et `mot_de_passe` sont des chaînes non vides ; sinon **422** ;
- rechercher l'utilisateur avec `CompteRepository::parEmail()` ;
- utiliser `password_verify()` et envoyer le **même message** 401 si l'adresse ou le mot de passe est incorrect ;
- si tout est correct, appeler `JetonJwt::emettre()` puis renvoyer **200** avec `token`, `token_type` et `expires_in`.

Ne stockez pas le mot de passe dans le JWT, et ne le journalisez pas.

## Mission 3 — Émettre et vérifier correctement un JWT (50 min)

Complétez `src/Auth/JetonJwt.php` avec la bibliothèque **firebase/php-jwt**, déjà déclarée dans Composer.

Le jeton doit contenir uniquement les claims nécessaires :

| Claim | Valeur attendue |
|---|---|
| `iss` | `bts-sio-atelier26` |
| `aud` | `bts-sio-api` |
| `sub` | identifiant de compte **sous forme de chaîne** |
| `iat` | horodatage de création (Unix) |
| `exp` | horodatage d'expiration (`iat + 900`) |

Utilisez `JWT::encode($claims, $secret, 'HS256')` et, pour vérifier, `JWT::decode($token, new Key($secret, 'HS256'))`. Contrôlez aussi vous-même `iss`, `aud` et la forme de `sub`. Vérifiez que `exp` est bien présent, en plus de sa validité temporelle prise en charge par la bibliothèque.

**La signature prouve l'intégrité et l'origine selon la clé de confiance ; elle ne chiffre pas le contenu.** Un JWT n'est pas une session PHP et ne nécessite pas `session_start()`.

## Mission 4 — Faire du middleware un garde-barrière (45 min)

Complétez `src/Auth/AuthentificationMiddleware.php` :

- récupérer l'en-tête `Authorization` et accepter uniquement le format `Bearer <token>` ;
- appeler `JetonJwt::verifier()`, sans jamais utiliser un `sub` décodé mais **non vérifié** ;
- en cas de jeton absent, mal formé, expiré ou de mauvaise signature : répondre **401** avec `WWW-Authenticate: Bearer` ;
- vérifier que le compte existe encore en base, puis transmettre son ID **vérifié** via `$request->withAttribute('compte_id', ...)` ;
- appeler `$handler->handle(...)` uniquement après succès.

Le middleware est rattaché aux **routes privées**, pas à `GET /api/etat` ni à `POST /api/login`. Il ne doit pas transformer en 401 des erreurs de programmation imprévues : ciblez les exceptions attendues de validation JWT.

## Mission 5 — Contrôler la propriété d'une ressource (30 min)

Implémentez `GET /api/notes/{id}` :

- contrôler l'ID d'URL ; une valeur incorrecte produit 400 ;
- chercher la note avec `CompteRepository::noteParId()` ; si elle n'existe pas : **404** ;
- comparer `compte_id` vérifié par le middleware à `proprietaire_id` de la note ; s'ils diffèrent : **403** ;
- si le contrôle passe : **200** et les données de la note **sans exposer son propriétaire sous forme de secret**.

Un utilisateur authentifié n'est **pas automatiquement autorisé** à consulter une note d'un autre utilisateur. Modifier un ID dans l'URL ne doit jamais suffire à outrepasser cette règle.

## Mission 6 — Recette et enquête de sécurité (40 min)

Lancez la recette, serveur déjà démarré et `JWT_SECRET` disponible dans le terminal de test :

```bash
composer test
```

Le testeur contrôle les scénarios publics, la connexion, l'accès privé, la propriété d'une note, une signature altérée et un jeton expiré. Les tests doivent d'abord **échouer sur les 501 du starter**, puis passer au fur et à mesure de votre implémentation.

Exécutez aussi manuellement `requests.http` ou `curl` ; copiez un jeton dans un décodeur **hors ligne** pour constater que ses claims sont lisibles. **Ne collez jamais un véritable jeton de production sur un site externe**.

Complétez `RECETTE.md` avec les statuts observés, les preuves et trois réponses argumentées :
1. que se passe-t-il si l'on remplace le `sub` sans recalculer la signature ?
2. pourquoi un JWT volé peut-il fonctionner malgré une signature correcte ?
3. supprimer un jeton côté client invalide-t-il instantanément toutes ses copies ?

## Critères de réussite

- la connexion contrôle réellement un mot de passe haché avec `password_verify()` ;
- les jetons ont une signature HS256 valide, une durée de vie de 900 s et des claims contrôlés ;
- aucun claim n'est accepté avant vérification cryptographique ;
- les routes privées refusent tout accès sans jeton valide ;
- un jeton valide ne permet **pas** d'accéder à la note d'un autre compte ;
- les statuts 401 et 403 sont distingués ;
- les réponses ne divulguent ni secret ni trace technique ;
- la recette est reproductible depuis une base fraîche.

## Défis facultatifs (après le socle)

1. **Rôle administrateur** : finaliser `GET /api/admin/statistiques` ; relire le rôle actuel en base plutôt que de croire aveuglément un rôle figé dans un ancien jeton.
2. **Limitations de connexion** : proposer une stratégie de rate limiting (429) et une journalisation sans mot de passe ni JWT.
3. **Cycle de vie** : documenter ce qui manque pour une vraie déconnexion immédiate : révocation, rotation et éventuellement refresh token.
4. **Comparer les architectures** : justifier quand une session PHP classique serait plus simple et mieux adaptée que JWT.

## Livrables

Dossier `starter/` fonctionnel, `RECETTE.md` renseigné, preuves des cas 200/401/403/404 et un schéma de séquence. Pour une soutenance, soyez capables d'expliquer **qui vérifie la preuve d'identité** et **qui prend la décision d'autorisation**.

**Périmètre :** application pédagogique locale, et **non** un système d'authentification de production. Ne publiez pas ces comptes de démonstration. En production : HTTPS, secrets externalisés, limitation des tentatives, surveillance, politique de révocation et gestion des clients sont indispensables.

## Documentation de référence

- [RFC 7519 — JSON Web Token](https://www.rfc-editor.org/rfc/rfc7519)
- [firebase/php-jwt — installation et API](https://github.com/firebase/php-jwt) (voir aussi [Packagist](https://packagist.org/packages/firebase/php-jwt))
- [Slim 4 — middleware](https://www.slimframework.com/docs/v4/concepts/middleware.html)
- [OWASP — JWT Cheat Sheet](https://cheatsheetseries.owasp.org/cheatsheets/JSON_Web_Token_Cheat_Sheet_for_Java.html)
