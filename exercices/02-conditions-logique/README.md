# Atelier 02 — Conditions et logique

**Durée : 1 h 30 — Niveau : intermédiaire**

Une décision informatique ne possède aucune intuition : elle applique exactement les règles écrites, y compris lorsqu'elles se chevauchent ou oublient une frontière. Cet atelier entraîne donc moins à « écrire des `if` » qu'à formuler des règles sans ambiguïté.

## Exercice 1 — De la note à l'appréciation (25 min)

Complétez `appreciationFilm`. La note appartient à l'intervalle de 0 à 10 :

- à partir de 8,5 : `Exceptionnel` ;
- à partir de 7 : `Très bon` ;
- à partir de 5 : `Intéressant` ;
- sinon : `À redécouvrir`.

Raisonnez du seuil le plus exigeant vers le plus large. Testez 8,49 puis 8,5, 6,99 puis 7, et 4,99 puis 5.

## Exercice 2 — Le tarif de la cinémathèque (25 min)

Écrivez `calculerTarif`. Le plein tarif vaut 9 €. Une personne de moins de 18 ans paie 6 €. Une personne de 65 ans ou plus paie 7 €. Les membres bénéficient ensuite d'une réduction de 2 €, quel que soit leur âge. Le prix ne peut jamais devenir négatif.

Avant de coder, faites un tableau de décision couvrant les âges 17, 18, 64 et 65, avec et sans adhésion. Cette étape révèle les frontières et empêche les conditions contradictoires.

## Exercice 3 — Une année bissextile (25 min)

Le calendrier grégorien suit une règle moins simple que « tous les quatre ans ». Une année est bissextile si elle est divisible par 4, sauf les années divisibles par 100 qui ne le sont pas, à moins d'être aussi divisibles par 400. Ainsi 1900 ne l'était pas, tandis que 2000 l'était.

Complétez `estBissextile` avec les opérateurs `%`, `===`, `&&` et `||`.

## Exercice 4 — Des badges cumulables (15 min)

À partir d'un film associatif, construisez un tableau de badges indépendants : `Classique` avant 2000, `Coup de cœur` à partir de 8, `Disponible` si le booléen correspondant vaut vrai, et `Format long` au-delà de 150 minutes. Un même film peut recevoir plusieurs badges : utilisez donc plusieurs `if`, pas une chaîne `elseif`.

