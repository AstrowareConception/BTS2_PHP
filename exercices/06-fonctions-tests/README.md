# Atelier 06 — Fonctions, contrats et tests

**Durée : 2 heures — Niveau : intermédiaire à difficile**

Une fonction constitue un petit contrat : elle reçoit des données définies, réalise une tâche identifiable et retourne un résultat prévisible. Les tests rendent ce contrat observable et protègent le code contre les régressions.

## Exercice 1 — Décomposer un programme (25 min)

Le fichier `starter/monolithe.php` mélange nettoyage, calculs et HTML. Réorganisez-le en fonctions : `normaliserTitre`, `calculerDureeMoyenne`, `selectionnerFilmsDisponibles` et `formaterPrix`. Une fonction de traitement retourne une valeur et n'utilise pas `echo`.

## Exercice 2 — La clé ISBN-10 (35 min)

L'ISBN identifie les éditions de livres. Pour les neuf premiers chiffres d'un ISBN-10, multipliez chaque chiffre par un poids descendant de 10 à 2. La clé rend la somme totale, clé pondérée par 1 comprise, divisible par 11. La valeur 10 se note `X`.

Complétez `calculerCleIsbn10`. L'entrée contient exactement neuf chiffres, éventuellement séparés par des tirets ou des espaces. Nettoyez-la puis refusez toute autre forme avec `InvalidArgumentException`. Exemple : `0-306-40615` produit `2`.

## Exercice 3 — Concevoir les tests (35 min)

Avant d'implémenter `estPalindrome`, complétez sa matrice de tests : mot ordinaire, palindrome impair, palindrome pair, casse différente, espaces, accents et chaîne vide. La fonction ignore la casse et les espaces, mais conserve les autres caractères. Un résultat juste sur un exemple ne constitue pas une preuve suffisante.

## Exercice 4 — Trois responsabilités (25 min)

Créez `data/livres.php`, `functions.php` et `index.php`. Les données restent brutes, les fonctions effectuent les transformations et `index.php` prépare puis affiche la page. Ajoutez au moins un test par fonction. Utilisez `require` avec `__DIR__`.

