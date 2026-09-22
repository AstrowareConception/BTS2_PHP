# Atelier 05 — Algorithmes classiques

**Durée : 2 heures — Niveau : intermédiaire à difficile**

Ces problèmes ont traversé les siècles parce qu'ils montrent des idées fondamentales : construire une suite, éviter les calculs inutiles, éliminer méthodiquement des candidats et observer la différence entre une définition mathématique et un programme efficace.

## Exercice 1 — Les lapins de Fibonacci (30 min)

Leonardo de Pise, dit Fibonacci, popularise en Europe au XIIIe siècle une suite déjà étudiée dans les mathématiques indiennes. Chaque terme est la somme des deux précédents : `0, 1, 1, 2, 3, 5…`.

Complétez `fibonacciIteratif($n)` pour retourner le terme d'indice `n`, avec `F(0)=0` et `F(1)=1`. Refusez les indices négatifs. Puis produisez les vingt premiers termes et le rapport entre deux termes successifs non nuls : il se rapproche du nombre d'or sans jamais l'atteindre exactement.

## Exercice 2 — Reconnaître un nombre premier (25 min)

Un nombre premier possède exactement deux diviseurs positifs : 1 et lui-même. Écrivez `estPremier`. Les nombres inférieurs à 2 ne sont pas premiers. Il suffit de tester les diviseurs tant que leur carré ne dépasse pas le nombre : si aucun n'a été trouvé avant cette limite, le quotient correspondant a déjà été couvert.

## Exercice 3 — Le crible d'Ératosthène (45 min)

Ératosthène de Cyrène, savant du IIIe siècle avant notre ère, est aussi connu pour une estimation remarquable de la circonférence terrestre. Son crible énumère les nombres premiers en éliminant les multiples des nombres déjà reconnus premiers.

Complétez `cribleEratosthene($limite)` :

1. créez un tableau de booléens indexé de 0 à la limite ;
2. marquez 0 et 1 comme non premiers ;
3. partez de 2 et éliminez ses multiples à partir de son carré ;
4. continuez tant que le carré du candidat ne dépasse pas la limite ;
5. retournez la liste des indices restés vrais.

Pour 30, le résultat attendu est `[2,3,5,7,11,13,17,19,23,29]`.

## Exercice 4 — Nombres parfaits (20 min)

Les pythagoriciens qualifiaient de parfait un entier égal à la somme de ses diviseurs propres. Ainsi `6 = 1 + 2 + 3` et `28 = 1 + 2 + 4 + 7 + 14`. Écrivez `estParfait` et recherchez les nombres parfaits inférieurs à 10 000.

## Défi

Comparez le nombre de divisions effectuées par une recherche naïve des nombres premiers et par le crible. Il ne suffit pas d'annoncer que l'un est plus rapide : ajoutez des compteurs et rapportez des mesures.

