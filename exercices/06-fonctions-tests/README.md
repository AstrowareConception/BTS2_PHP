# Atelier 06 — Fonctions, contrats et tests

**Durée : 2 heures — Niveau : intermédiaire à difficile**

Une fonction constitue un petit contrat : elle reçoit des données définies, réalise une tâche identifiable et retourne un résultat prévisible. Les tests rendent ce contrat observable et protègent le code contre les régressions.

## Exercice 1 — Décomposer un programme (25 min)

Le fichier `starter/monolithe.php` mélange nettoyage, calculs et HTML. Réorganisez-le en fonctions : `normaliserTitre`, `calculerDureeMoyenne`, `selectionnerFilmsDisponibles` et `formaterPrix`. Une fonction de traitement retourne une valeur et n'utilise pas `echo`.

## Exercice 2 — La clé ISBN-10 (35 min)

Un ISBN-10 comporte **neuf chiffres suivis d’une clé de contrôle**. Cette clé permet de vérifier que le numéro n’a pas été mal saisi.

Complétez la fonction `calculerCleIsbn10(string $isbn): string`.

### 1. Nettoyage et validation

La chaîne reçue peut contenir :

- exactement **neuf chiffres** ;
- des espaces ou des tirets servant de séparateurs.

Supprimez les espaces et les tirets. Après ce nettoyage, la chaîne doit contenir exactement neuf chiffres.

Dans tous les autres cas, lancez une `InvalidArgumentException` : nombre incorrect de chiffres, lettre, ponctuation interdite ou chaîne vide.

Exemples d’entrées valides :

```text
030640615
0-306-40615
0 306 40615
```

Exemples d’entrées invalides :

```text
03064061        seulement huit chiffres
0306406157      dix chiffres
0-306-40A15     présence d’une lettre
0-306/40615     caractère « / » interdit
```

### 2. Calcul de la clé

Multipliez les neuf chiffres par des poids décroissants allant de **10 à 2** :

```text
1er chiffre × 10
2e chiffre × 9
3e chiffre × 8
...
9e chiffre × 2
```

Additionnez les neuf résultats. La clé doit compléter cette somme afin que le total soit divisible par 11 :

```text
clé = (11 - (somme % 11)) % 11
```

Si la clé obtenue vaut `10`, retournez la chaîne `"X"`. Sinon, retournez le chiffre obtenu sous forme de chaîne.

### Exemple

Pour `0-306-40615`, les neuf chiffres sont :

```text
0 3 0 6 4 0 6 1 5
```

Le calcul donne :

```text
0×10 + 3×9 + 0×8 + 6×7 + 4×6 + 0×5 + 6×4 + 1×3 + 5×2
= 130
```

Comme `130 + 2 = 132` et que `132` est divisible par 11, la fonction retourne :

```text
"2"
```

## Exercice 3 — Concevoir les tests (35 min)

Avant d'implémenter `estPalindrome`, complétez sa matrice de tests : mot ordinaire, palindrome impair, palindrome pair, casse différente, espaces, accents et chaîne vide. La fonction ignore la casse et les espaces, mais conserve les autres caractères. Un résultat juste sur un exemple ne constitue pas une preuve suffisante.

## Exercice 4 — Trois responsabilités (25 min)

Créez `data/livres.php`, `functions.php` et `index.php`. Les données restent brutes, les fonctions effectuent les transformations et `index.php` prépare puis affiche la page. Ajoutez au moins un test par fonction. Utilisez `require` avec `__DIR__`.

