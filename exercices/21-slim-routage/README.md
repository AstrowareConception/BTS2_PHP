# Atelier 21 — Apprendre Slim par le protocole HTTP

**Durée : 1 h 30 — Niveau : intermédiaire — Prérequis : HTTP, Composer et fonctions PHP**

Slim est un micro-framework : il n'impose ni base de données, ni moteur de vues, ni architecture complète. Cette sobriété est utile pour comprendre précisément le trajet d'une requête. Dans cet atelier, chaque route isole une notion : chemin, paramètre, query string, corps JSON, statut et en-tête.

## Mise en route (10 min)

Dans `starter/` :

```bash
composer install
composer start
```

Dans un second terminal, utilisez `requests.http` avec un client HTTP ou recopiez les commandes `curl`. La route `GET /` fonctionne déjà ; les autres renvoient volontairement `501 Not Implemented`.

## Mission 1 — Paramètres de chemin (20 min)

Implémentez les routes suivantes :

| Requête | Réponse attendue | Cas à refuser |
|---|---|---|
| `GET /bonjour/Ada` | `Bonjour Ada !` | nom vide |
| `GET /addition/12/30` | JSON contenant `42` | paramètres non entiers |
| `GET /films/7` | JSON contenant l'identifiant `7` | identifiant inférieur à 1 |

Une donnée invalide produit un JSON explicite et le statut `400`, jamais une erreur PHP brute.

## Mission 2 — Query string et réponses immuables (20 min)

Complétez `GET /recherche?q=alien&limite=5` :

- `q` est obligatoire après suppression des espaces ;
- `limite` vaut 10 par défaut et doit rester entre 1 et 50 ;
- la réponse JSON rappelle les valeurs normalisées ;
- l'en-tête `X-Search-Limit` contient la limite retenue.

PSR-7 considère les objets requête et réponse comme immuables. Montrez, avec une expérience très courte, que l'appel à `withHeader()` ne modifie pas l'objet d'origine : il renvoie une nouvelle réponse qu'il faut conserver.

## Mission 3 — Lire un corps JSON (25 min)

Le middleware de lecture du corps est déjà activé. Implémentez `POST /miroir` :

1. vérifier que le corps analysé est un tableau ;
2. exiger une propriété texte `message` non vide ;
3. renvoyer `{"message":"...","longueur":...}` avec le statut `201` ;
4. renvoyer `422 Unprocessable Entity` si le JSON est lisible mais ne respecte pas le contrat.

Testez aussi un JSON mal formé. Notez la différence entre une requête impossible à lire et une donnée métier invalide.

## Mission 4 — Cartographier le cycle (15 min)

Pour une requête réussie, représentez les six étapes suivantes : client, serveur PHP, middleware, routeur, callback, réponse. Indiquez à quel endroit sont choisis le statut, les en-têtes et le corps.

## Critères de réussite

- toutes les requêtes de `requests.http` produisent le statut documenté ;
- chaque réponse JSON possède `Content-Type: application/json` ;
- aucune donnée fournie par le client n'est supposée valide ;
- aucun `echo`, `header()` ou `http_response_code()` n'est utilisé dans les routes Slim.

## Défis

- créer un middleware qui ajoute `X-Course: BTS-SIO` à toutes les réponses ;
- nommer une route puis générer son URL avec le routeur ;
- transformer les erreurs 404 en JSON sans divulguer de trace technique.
