# Atelier 09 — Enquête HTTP et superglobales

**Durée : 1 h 30 — Support : PHP interactif — Niveau : progressif**

Le navigateur masque souvent la mécanique HTTP derrière un clic. Dans cet atelier, vous devrez au contraire suivre chaque donnée : champ HTML, paramètre d'URL, entrée de `$_GET`, variable locale, filtre puis valeur réaffichée.

## Mission 1 — Autopsier trois requêtes (20 min)

Démarrez le serveur PHP, ouvrez les outils de développement et documentez dans `OBSERVATIONS.md` trois requêtes : chargement initial, recherche avec un seul paramètre, recherche avec deux genres cochés. Pour chacune, relevez méthode, URL, query string, code de réponse et contenu de `$_GET`.

Modifiez ensuite l'URL à la main. Expliquez pourquoi les attributs HTML `required`, `min` ou une liste `<select>` ne constituent pas une frontière de sécurité.

## Mission 2 — Lire sans avertissement (20 min)

Complétez `lireFiltres`. La fonction reçoit un tableau représentant une source externe et retourne toujours la structure suivante :

```php
['q' => string, 'annee' => string, 'genres' => array]
```

Une clé absente ne doit produire aucun avertissement. Retirez les espaces extérieurs de `q` et `annee`. Ignorez les valeurs de `genres` qui ne sont pas des chaînes.

## Mission 3 — Catalogue filtrable (35 min)

Créez dans `starter/index.php` un formulaire GET et filtrez le tableau fourni. Les critères sont cumulables : partie du titre insensible à la casse, année minimale et plusieurs genres acceptés. Réaffichez tous les critères dans le formulaire, après échappement HTML.

Ne lisez `$_GET` qu'une seule fois : copiez les données dans `$filtres`, puis transmettez des variables ordinaires aux fonctions.

## Mission 4 — Diagnostic serveur raisonné (15 min)

Affichez temporairement `REQUEST_METHOD`, `REQUEST_URI` et `HTTP_USER_AGENT`. Indiquez lesquelles sont contrôlables par le client et pourquoi elles ne prouvent pas son identité. Retirez cet affichage de la version finale.

## Défis

- Produisez l'URL canonique du filtre avec `http_build_query`.
- Ajoutez un tri choisi dans une liste blanche `titre`, `annee`, `note`.
- Répondez avec le code 400 lorsqu'une structure de paramètres est incohérente.

## Preuves attendues

- tests publics réussis ;
- trois captures ou descriptions de requêtes ;
- aucun `Undefined array key` avec une URL vide ou falsifiée ;
- aucune superglobale utilisée dans une fonction métier.

