# Atelier 07 — Récursivité

**Durée : 1 h 30 — Niveau : difficile**

Une fonction récursive se définit à l'aide d'une version plus petite du même problème. Elle exige un **cas de base**, qui arrête les appels, et un **pas récursif**, qui rapproche réellement de ce cas. Sans ces deux garanties, l'élégance apparente devient une cascade d'appels sans fin.

## Exercice 1 — Factorielle et pile d'appels (20 min)

La factorielle de `n` vaut `n × (n-1) × … × 1`, avec `0! = 1`. Complétez `factorielleRecursive`. Dessinez la pile des appels pour `4!`, puis la remontée des résultats. Refusez les entiers négatifs.

## Exercice 2 — Somme des chiffres (20 min)

La somme des chiffres de 2026 vaut 10. Utilisez `% 10` pour obtenir le dernier chiffre et une division entière par 10 pour réduire le problème. Le cas de base survient quand le nombre possède un seul chiffre.

## Exercice 3 — Palindrome récursif (25 min)

Après normalisation, comparez le premier et le dernier caractère. S'ils diffèrent, retournez faux. Sinon, recommencez avec la sous-chaîne intérieure. Une chaîne de longueur 0 ou 1 est un palindrome. Utilisez les fonctions `mb_*` pour ne pas casser les caractères accentués.

## Exercice 4 — La beauté coûteuse de Fibonacci (25 min)

Écrivez la définition récursive directe de Fibonacci. Ajoutez un compteur d'appels et comparez-la à la version itérative pour `n = 5, 10, 20, 30`. Expliquez en cinq lignes pourquoi de nombreux sous-problèmes sont recalculés. L'objectif n'est pas de conclure que la récursivité est mauvaise, mais de comprendre que la forme la plus proche de la définition mathématique n'est pas toujours la plus efficace.

## Défi

Un tableau peut contenir des nombres ou d'autres tableaux. Écrivez `sommeProfonde([1,[2,3],[4,[5]]])`, qui retourne 15 sans connaître à l'avance la profondeur.

