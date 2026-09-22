# Atelier 03 — Boucles et raisonnements itératifs

**Durée : 2 heures — Niveau : intermédiaire**

Une boucle est une démonstration miniature : elle commence dans un état connu, maintient une règle et progresse jusqu'à une condition d'arrêt. Une boucle qui ne progresse pas devient infinie ; une limite mal choisie produit l'erreur classique du « décalage d'une unité ».

## Exercice 1 — Échauffement contrôlé (25 min)

Produisez successivement : les entiers de 1 à 20, les nombres pairs de 2 à 40, un compte à rebours de 10 à 0, puis la table de multiplication de 7. Utilisez `for` lorsque le nombre d'itérations est connu. Présentez la table dans un véritable tableau HTML.

## Exercice 2 — FizzBuzz et l'histoire d'un test d'entretien (30 min)

FizzBuzz est devenu célèbre comme exercice très court permettant de vérifier la maîtrise des conditions et du modulo. Pour les nombres de 1 à 100 : affichez `Fizz` pour les multiples de 3, `Buzz` pour ceux de 5, `FizzBuzz` pour ceux des deux, et le nombre dans les autres cas.

L'ordre des conditions compte. Écrivez d'abord sur papier ce qui arriverait à 15 si le programme testait le multiple de 3 avant la combinaison. Ajoutez ensuite votre variante : `Pop` pour 7 et `FizzBuzzPop` pour 105.

## Exercice 3 — La conjecture de Collatz (35 min)

En 1937, Lothar Collatz étudie une règle déconcertante. À partir d'un entier positif : s'il est pair, on le divise par deux ; s'il est impair, on le multiplie par trois et on ajoute un. Malgré son apparente simplicité, personne n'a démontré que toute suite atteint toujours 1.

Complétez `suiteCollatz`. La fonction retourne toutes les valeurs, nombre de départ et 1 compris. Pour 6, le résultat vaut `[6, 3, 10, 5, 16, 8, 4, 2, 1]`. Utilisez `while`, prévoyez l'évolution à chaque tour et refusez les entiers inférieurs à 1 avec `InvalidArgumentException`.

Calculez ensuite, parmi les départs de 1 à 100, celui qui produit la suite la plus longue.

## Exercice 4 — Une frise générée (30 min)

Le tableau fourni contient quelques jalons de l'histoire de PHP. Utilisez `foreach` pour produire une frise HTML. Chaque article doit contenir l'année, la version et le fait historique. Ajoutez la classe CSS `majeure` si l'entrée est marquée comme telle. Le HTML ne doit être écrit qu'une fois dans la boucle.

## Défi

Recherchez un cycle éventuel dans une suite sans supposer qu'elle atteindra 1 : mémorisez les valeurs déjà rencontrées et interrompez la boucle avec `break` en cas de répétition.

