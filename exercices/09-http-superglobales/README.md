# Atelier 09 — Enquête HTTP et superglobales

**Durée : 1 h 30 — Support : PHP interactif — Niveau : progressif**

Le navigateur masque souvent la mécanique HTTP derrière un clic. Dans cet atelier, vous devrez au contraire suivre chaque donnée : champ HTML, paramètre d'URL, entrée de `$_GET`, variable locale, filtre puis valeur réaffichée.

## Important — Que signifie « À compléter » dans le starter ?

Dans l'ancienne version du fichier `starter/functions.php`, les fonctions contenaient cette instruction :

```php
throw new LogicException('À compléter');
```

Cette exception ne faisait **pas** partie du résultat attendu. Elle servait uniquement à signaler qu'une fonction était encore vide. Il ne fallait donc ni la conserver, ni chercher à la déclencher volontairement : elle devait être remplacée par votre algorithme et par une instruction `return`.

Le nouveau starter contient désormais une structure qui peut s'exécuter sans exception. Les variables et le tableau de résultat sont déjà préparés, mais les zones marquées `TODO` restent à programmer.

Dans cet atelier :

- une URL sans paramètre est normale et ne doit provoquer aucune erreur ;
- une clé absente dans la source est normale ;
- une valeur ayant une forme inattendue doit être neutralisée proprement ;
- les fonctions `lireFiltres` et `filtrerFilms` ne doivent lancer aucune exception pour ces situations.

## Mission 1 — Autopsier trois requêtes (20 min)

Démarrez le serveur PHP, ouvrez les outils de développement et documentez dans `OBSERVATIONS.md` trois requêtes : chargement initial, recherche avec un seul paramètre, recherche avec deux genres cochés. Pour chacune, relevez méthode, URL, query string, code de réponse et contenu de `$_GET`.

Modifiez ensuite l'URL à la main. Expliquez pourquoi les attributs HTML `required`, `min` ou une liste `<select>` ne constituent pas une frontière de sécurité.

## Mission 2 — Lire les filtres sans avertissement (20 min)

### Le contrat de `lireFiltres`

La fonction reçoit un tableau représentant une source externe, généralement `$_GET` :

```php
$filtres = lireFiltres($_GET);
```

Cependant, la fonction ne doit jamais lire directement `$_GET`. Elle travaille uniquement avec son paramètre `$source`, ce qui permet de la tester facilement.

Elle retourne **toujours** exactement cette structure :

```php
[
    'q' => string,
    'annee' => string,
    'genres' => array,
]
```

Les valeurs par défaut sont une chaîne vide pour `q` et `annee`, et un tableau vide pour `genres`. Une valeur vide signifie que ce critère ne limitera pas la recherche.

### Exemples attendus

```php
lireFiltres([]);
// ['q' => '', 'annee' => '', 'genres' => []]

lireFiltres([
    'q' => ' Alien ',
    'annee' => ' 1970 ',
    'genres' => ['science-fiction', 12],
]);
// ['q' => 'Alien', 'annee' => '1970', 'genres' => ['science-fiction']]

lireFiltres([
    'q' => ['Alien'],
    'annee' => 1970,
    'genres' => 'science-fiction',
]);
// ['q' => '', 'annee' => '', 'genres' => []]
```

Le dernier exemple représente une requête falsifiée. `trim()` attend une chaîne : il ne faut donc l'appeler qu'après avoir vérifié le type avec `is_string()`.

### Algorithme conseillé

1. Initialisez `$q`, `$annee` et `$genres` avec leurs valeurs par défaut.
2. Si `q` existe et contient une chaîne, nettoyez-la avec `trim()`.
3. Procédez de la même manière pour `annee`.
4. Si `genres` contient un tableau, parcourez-le et conservez uniquement les éléments qui sont des chaînes.
5. Retournez le tableau normalisé.

Une clé absente ne doit produire aucun `Undefined array key`. Utilisez notamment l'opérateur `??` ou `isset()`.

## Mission 3 — Catalogue filtrable (35 min)

### Partie A — Compléter `filtrerFilms`

La fonction reçoit le catalogue et le résultat de `lireFiltres`. Elle retourne un **nouveau tableau** contenant uniquement les films acceptés. Le tableau d'origine ne doit pas être modifié.

Les trois critères sont facultatifs :

| Filtre | Critère actif lorsque… | Le film est accepté si… |
|---|---|---|
| `q` | la chaîne n'est pas vide | son titre contient `q`, sans distinction majuscules/minuscules |
| `annee` | la chaîne n'est pas vide | son année est supérieure ou égale à l'année demandée |
| `genres` | le tableau n'est pas vide | son genre appartient aux genres sélectionnés |

Les critères actifs sont **cumulatifs** : un film doit les respecter tous. À l'intérieur du filtre `genres`, plusieurs genres sont au contraire des possibilités alternatives.

Exemple :

```php
$filtres = [
    'q' => 'ALI',
    'annee' => '1970',
    'genres' => ['science-fiction', 'drame'],
];
```

`Alien` est conservé : son titre contient `ALI` sans tenir compte de la casse, son année 1979 est au moins égale à 1970 et son genre figure dans la sélection. `Parasite` est refusé malgré son genre et son année, car son titre ne contient pas `ALI`.

Pour chaque film, construisez trois booléens, par exemple `$titreCorrespond`, `$anneeCorrespond` et `$genreCorrespond`. Initialisez-les à `true`, puis modifiez-les seulement lorsque le critère correspondant est actif. Ajoutez le film au résultat uniquement si les trois booléens valent `true`.

Indices utiles :

```php
stripos('Alien', 'ALI') !== false; // true
in_array('drame', ['science-fiction', 'drame'], true); // true
```

Si aucun filtre n'est actif, tous les films doivent être retournés. Si aucun film ne correspond, retournez simplement `[]` : ce n'est pas une erreur et aucune exception ne doit être lancée.

### Partie B — Construire l'interface dans `starter/index.php`

Créez un formulaire utilisant la méthode GET puis affichez `$filmsVisibles`. Réaffichez les critères sélectionnés dans le formulaire après échappement HTML.

Ne lisez `$_GET` qu'une seule fois : la ligne `$filtres = lireFiltres($_GET);` effectue cette transition. Après elle, travaillez uniquement avec `$filtres` et avec des variables ordinaires.

## Mission 4 — Diagnostic serveur raisonné (15 min)

Affichez temporairement `REQUEST_METHOD`, `REQUEST_URI` et `HTTP_USER_AGENT`. Indiquez lesquelles sont contrôlables par le client et pourquoi elles ne prouvent pas son identité. Retirez cet affichage de la version finale.

## Lancer les tests

Depuis la racine du dépôt :

```bash
php exercices/09-http-superglobales/tests/http_test.php
```

Un test en échec n'est pas une exception à ajouter : il indique seulement que la valeur retournée ne respecte pas encore le contrat. Lisez le nom du cas, comparez le résultat attendu au résultat obtenu, puis corrigez une étape à la fois.

## Défis

- Produisez l'URL canonique du filtre avec `http_build_query`.
- Ajoutez un tri choisi dans une liste blanche `titre`, `annee`, `note`.
- Répondez avec le code 400 lorsqu'une structure de paramètres est incohérente.

Le dernier défi introduit volontairement une autre stratégie : dans l'exercice principal, les formes incorrectes sont neutralisées ; dans le défi, vous pouvez choisir de les signaler au client avec une réponse HTTP 400. Ne mélangez pas ces deux comportements dans les fonctions demandées par les tests publics.

## Preuves attendues

- tests publics réussis ;
- trois captures ou descriptions de requêtes ;
- aucun `Undefined array key` avec une URL vide ou falsifiée ;
- aucune superglobale utilisée dans une fonction métier ;
- aucune `LogicException('À compléter')` restante.
