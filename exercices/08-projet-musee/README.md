# Atelier 08 — Projet final : le Musée des algorithmes

**Durée : 2 h 30 — Niveau : synthèse**

Vous devez construire une page web consacrée à quelques figures et idées majeures de l'histoire des algorithmes. Le visiteur découvrira que l'algorithmique ne naît pas avec l'ordinateur : le mot lui-même dérive du nom latinisé du savant persan Al-Khwârizmî, tandis que des méthodes attribuées à Euclide ou Ératosthène précèdent de plus de deux millénaires nos langages modernes.

Le projet utilise seulement les notions du premier cours. Il ne contient ni formulaire, ni variable superglobale, ni cookie, ni session, ni base de données.

## Cahier des charges

La page doit présenter les entrées de `data/oeuvres.php`. Chaque entrée possède un nom, une époque, une aire culturelle, une idée, un exemple numérique, un niveau de difficulté et des mots-clés.

### 1. Architecture obligatoire (25 min)

- `data/oeuvres.php` conserve les données brutes ;
- `functions.php` contient tous les traitements ;
- `index.php` configure le filtre, prépare les valeurs et produit le HTML ;
- `assets/style.css` assure une présentation lisible.

Chargez les fichiers avec `require` et `__DIR__`. Aucune balise HTML ne doit être produite dans les fonctions de calcul.

### 2. Fonctions attendues (45 min)

Complétez au minimum :

- `normaliserTexte`, qui prépare une comparaison insensible à la casse ;
- `filtrerParMotCle`, qui retourne toutes les entrées correspondant à un mot-clé ou toutes les entrées si le filtre est vide ;
- `compterParEpoque`, qui construit un tableau associatif `époque => quantité` ;
- `creerExtrait`, qui limite l'idée à 24 mots sans couper un mot ;
- `niveauLisible`, qui transforme les niveaux 1, 2 et 3 en `Découverte`, `Intermédiaire` et `Avancé`.

Chaque fonction doit fonctionner avec un tableau vide. Les entrées d'origine ne doivent pas être modifiées.

### 3. Galerie HTML (45 min)

Dans `index.php`, une seule structure `<article>` doit être répétée avec `foreach`. Chaque carte affiche toutes les informations, un extrait de l'idée et les mots-clés réunis avec `implode`. Toute chaîne issue des données passe par `htmlspecialchars`.

Le filtre reste une variable configurée en haut de `index.php`, par exemple `$motCleActif = 'nombres';`. Il ne provient pas de `$_GET`, qui sera étudié dans le prochain cours.

### 4. Tableau de bord (20 min)

Affichez le nombre d'entrées visibles, leur répartition par époque et le nombre de mots-clés distincts. Si aucune entrée ne correspond au filtre, montrez un message clair sans provoquer d'erreur.

### 5. Qualité et recette (15 min)

- testez le filtre vide, un filtre connu et un filtre absent ;
- vérifiez la page avec un tableau de données vide ;
- lancez `php -l` sur tous les fichiers ;
- lancez les tests fournis ;
- ajoutez dans `COMPTE_RENDU.md` deux difficultés rencontrées, leur diagnostic et la solution choisie.

## Critères d'évaluation

| Critère | Points |
|---|---:|
| Résultat fonctionnel et cas limites | 8 |
| Choix des structures et algorithmes | 4 |
| Séparation données, traitements, affichage | 3 |
| Lisibilité, noms et types | 3 |
| Tests et compte rendu | 2 |

## Défis facultatifs

1. Ajoutez une fiche sur Ada Lovelace et expliquez pourquoi son programme pour les nombres de Bernoulli est souvent présenté comme le premier algorithme destiné à une machine.
2. Triez les cartes par siècle, puis par nom, sans altérer le tableau source.
3. Affichez réellement l'exemple de Fibonacci ou du crible en appelant les fonctions de l'atelier 05.

