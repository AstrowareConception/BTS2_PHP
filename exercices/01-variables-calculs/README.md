# Atelier 01 — Variables, types et calculs

**Durée : 1 h 30 — Niveau : facile à intermédiaire**

Les catalogues de cinéma ont longtemps existé sous forme de fiches cartonnées. Une fiche bien tenue séparait déjà les données — titre, année, métrage, réalisateur — de leur présentation. Les variables jouent ce même rôle : elles donnent un nom stable à une information que le programme pourra transformer.

## Exercice 1 — Une fiche qui ne ment pas (25 min)

Dans `starter/fiche_film.php`, représentez le film *Alien* avec les données suivantes : année 1979, durée 117 minutes, note 8,5, prix de location 3,99 €, disponibilité vraie. Choisissez le type adapté à chaque valeur et produisez une fiche HTML.

Ajoutez temporairement `var_dump` pour contrôler chaque type. Expliquez dans un commentaire pourquoi l'année ne doit pas être stockée comme le texte `"1979"` et pourquoi le prix ne doit pas contenir le symbole euro.

## Exercice 2 — Du métrage à l'horloge (30 min)

Complétez la fonction `convertirDuree`. Une durée positive en minutes doit devenir un texte de la forme `2 h 05 min`. Le nombre de minutes doit toujours occuper deux chiffres. Exemples :

- `117` donne `1 h 57 min` ;
- `125` donne `2 h 05 min` ;
- `45` donne `0 h 45 min`.

Utilisez la division, une conversion en entier et le modulo. Le test fourni vérifie aussi zéro minute.

## Exercice 3 — La recette d'une projection (25 min)

Une cinémathèque vend 37 places à 7,50 €, dont 12 bénéficient d'une réduction de 20 %. Calculez le montant total, la recette moyenne par spectateur et l'écart avec une séance où toutes les places seraient vendues au plein tarif. Conservez les calculs sous forme numérique et utilisez `number_format` uniquement au moment de l'affichage.

## Contrôle final (10 min)

Pour chaque variable, notez son type attendu avant d'utiliser `var_dump`. Corrigez tout écart. Vérifiez ensuite la syntaxe des trois scripts.

## Défi

Une bobine de film 35 mm défile traditionnellement à 24 images par seconde. Calculez le nombre d'images correspondant à 117 minutes, puis estimez la longueur de pellicule sachant qu'une image occupe environ 19 mm dans le sens du défilement. Affichez le résultat en kilomètres.

