# Méthode de résolution et de débogage

## Avant d'écrire du PHP

Reformulez le problème en quatre questions :

1. Quelles sont les données de départ ?
2. Quel résultat faut-il produire ?
3. Quelles transformations relient les données au résultat ?
4. Quels cas particuliers risquent de contredire la solution évidente ?

Pour un calcul, réalisez au moins un exemple à la main. Pour une boucle, notez la valeur du compteur lors des trois premières itérations. Pour une condition, préparez un exemple qui rend chaque branche accessible.

## Une erreur est une information

Un message d'erreur indique généralement :

- le type du problème ;
- le fichier concerné ;
- le numéro de ligne où PHP a constaté le problème.

La cause réelle peut se trouver juste avant la ligne indiquée, par exemple un guillemet ou une parenthèse non fermé.

## Construire progressivement

Commencez par un cas simple qui fonctionne. Ajoutez ensuite une règle, puis relancez le script. Cette progression rend la cause d'une régression beaucoup plus facile à retrouver.

## Tester les frontières

Une fonction qui classe une note doit être testée juste avant, exactement sur et juste après chaque seuil. Une fonction qui parcourt un tableau doit être testée avec un tableau vide, un seul élément et plusieurs éléments.

## Utiliser les outils du langage

```php
var_dump($variable);
```

`var_dump` affiche la valeur et son type. Utilisez-le pendant le diagnostic, puis retirez-le de l'affichage final.

```bash
php -l script.php
```

Cette commande vérifie la syntaxe sans exécuter le programme.

