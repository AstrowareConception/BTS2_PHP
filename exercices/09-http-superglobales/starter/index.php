<?php

require_once __DIR__ . '/functions.php';

$films = [
    ['titre' => 'Alien', 'annee' => 1979, 'genre' => 'science-fiction', 'note' => 8.5],
    ['titre' => 'Metropolis', 'annee' => 1927, 'genre' => 'science-fiction', 'note' => 8.3],
    ['titre' => 'Parasite', 'annee' => 2019, 'genre' => 'drame', 'note' => 8.5],
    ['titre' => 'Les Temps modernes', 'annee' => 1936, 'genre' => 'comedie', 'note' => 8.5],
];

// C'est le seul endroit où l'application transmet directement $_GET.
// Les fonctions reçoivent ensuite des tableaux ordinaires et testables.
$filtres = lireFiltres($_GET);
$filmsVisibles = filtrerFilms($films, $filtres);

// TODO 1 — Construisez un formulaire utilisant method="get".
// Noms des champs attendus : q, annee et genres[]. Les crochets de genres[]
// permettent au navigateur d'envoyer plusieurs cases cochées dans un tableau.

// TODO 2 — Réaffichez les valeurs de $filtres dans les champs.
// Toute valeur insérée dans le HTML doit passer par htmlspecialchars(). Pour
// les cases de genre, ajoutez checked lorsque le genre est présent dans
// $filtres['genres'].

// TODO 3 — Parcourez $filmsVisibles et affichez chaque film.
// Si le tableau est vide, affichez un message comme « Aucun film trouvé ».

// Vous ne devez pas relire $_GET sous cette ligne : utilisez $filtres.
