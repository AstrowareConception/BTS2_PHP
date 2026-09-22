# Atelier 04 — Tableaux et textes

**Durée : 2 heures — Niveau : intermédiaire**

Un catalogue n'est pas une succession de variables isolées. Il constitue une collection d'objets décrits par les mêmes clés. Les tableaux associatifs permettent de donner un sens aux valeurs ; les fonctions de chaîne préparent ensuite ces données pour la comparaison ou l'affichage.

## Corpus

Le fichier `starter/data/films.php` contient huit films. Ne modifiez pas ces données brutes : tout nettoyage doit produire une nouvelle valeur.

## Exercice 1 — Radiographie du catalogue (30 min)

Calculez le nombre de films, la durée totale, la durée moyenne, le film le mieux noté et le nombre de films disponibles. Extrayez les genres avec `array_column`, éliminez les doublons, triez-les et affichez-les. Votre programme doit continuer à fonctionner si un neuvième film est ajouté.

## Exercice 2 — Normaliser sans mutiler (35 min)

Complétez `normaliserTexte` : retirez les espaces extérieurs et passez le texte en minuscules avec les fonctions `mb_*`. La donnée originale doit rester intacte. Utilisez cette fonction pour repérer les variantes de casse de « science-fiction ».

Écrivez ensuite `creerResumeCourt`. Elle limite un résumé à un nombre de mots sans couper le dernier mot et ajoute `…` seulement si le texte a réellement été raccourci. `explode` et `array_slice` suffisent.

## Exercice 3 — Fréquences de mots (30 min)

À partir d'une phrase déjà normalisée et débarrassée de sa ponctuation, construisez un tableau associatif où chaque mot devient une clé et son nombre d'apparitions une valeur. Affichez ensuite un histogramme textuel : `film : #### (4)`.

## Exercice 4 — Index alphabétique (25 min)

Triez une copie des titres sans modifier le catalogue. Produisez une liste HTML regroupée par première lettre. Protégez toute donnée insérée dans le HTML avec `htmlspecialchars`.

## Défi

Implémentez une recherche insensible à la casse sur le titre, le genre et le résumé, sans utiliser de variable superglobale. La chaîne recherchée reste une simple variable placée en tête du script.

