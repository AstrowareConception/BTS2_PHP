# Atelier 00 — Premiers scripts et chasse aux erreurs

**Durée : 1 heure — Niveau : découverte**

Les premiers programmeurs ne disposaient ni de coloration syntaxique ni de messages aussi précis que les nôtres. Sur les machines à cartes perforées, une faute pouvait n'apparaître qu'après le passage du paquet dans un lecteur. Aujourd'hui, PHP répond en quelques millisecondes : apprendre à lire cette réponse fait partie du métier.

## Mission 1 — De la source au navigateur (15 min)

Complétez `starter/bonjour.php` afin qu'il produise une page HTML contenant :

- le titre « Laboratoire PHP » ;
- votre prénom stocké dans une variable ;
- la version de PHP obtenue avec `PHP_VERSION` ;
- une phrase calculée à partir d'au moins deux variables.

Consultez d'abord le script dans le terminal, puis dans le navigateur avec le serveur intégré. Notez ce qui change entre les deux affichages. Affichez enfin le code source reçu par le navigateur : voyez-vous le code PHP ? Expliquez pourquoi en deux phrases dans `diagnostic.md`.

## Mission 2 — Le musée des erreurs (30 min)

Les cinq fragments de `starter/erreurs.php` sont commentés. Pour chacun :

1. recopiez-le seul dans un fichier temporaire ;
2. prévoyez le message ou le comportement ;
3. exécutez-le ;
4. relevez le type d'erreur et la ligne signalée ;
5. corrigez-le sans modifier l'intention initiale.

Les anomalies couvrent un point-virgule oublié, un guillemet non fermé, une variable utilisée trop tôt, une concaténation incorrecte et une balise PHP mal écrite.

## Mission 3 — Autopsie d'un script (15 min)

Dans `diagnostic.md`, identifiez pour votre script : les données, les instructions, les expressions, le HTML produit et l'endroit où s'exécute PHP. Terminez par une règle personnelle de débogage que vous pourrez réutiliser.

## Critères de réussite

- `php -l starter/bonjour.php` ne signale aucune erreur ;
- le HTML produit reste valide ;
- les variables portent des noms explicites ;
- le diagnostic distingue clairement serveur, réponse HTML et navigateur.

