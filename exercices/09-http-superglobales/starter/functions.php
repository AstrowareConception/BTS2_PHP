<?php

declare(strict_types=1);

/**
 * Transforme une source externe, par exemple $_GET, en filtres prévisibles.
 *
 * Cette fonction ne doit pas lire directement $_GET : elle utilise uniquement
 * le tableau reçu dans $source. Elle ne doit pas non plus lancer d'exception
 * lorsqu'une clé manque ou qu'une valeur possède un type inattendu.
 *
 * Exemples :
 * lireFiltres([])
 *     => ['q' => '', 'annee' => '', 'genres' => []]
 *
 * lireFiltres(['q' => ' Alien ', 'annee' => ' 1970 '])
 *     => ['q' => 'Alien', 'annee' => '1970', 'genres' => []]
 *
 * @return array{q:string, annee:string, genres:array<int,string>}
 */
function lireFiltres(array $source): array
{
    // Valeurs par défaut : aucun critère de recherche n'est actif.
    $q = '';
    $annee = '';
    $genres = [];

    // TODO 1 : récupérez q seulement si $source['q'] est une chaîne.
    // Nettoyez alors ses espaces extérieurs avec trim().
    // Attention : une URL peut contenir ?q[]=Alien ; dans ce cas q est un
    // tableau et trim() ne doit surtout pas être appelé sur cette valeur.

    // TODO 2 : faites la même chose pour annee.
    // La fonction conserve l'année sous forme de chaîne, comme elle arrive
    // depuis une query string : '1970', et non l'entier 1970.

    // TODO 3 : si $source['genres'] est un tableau, parcourez-le.
    // Ajoutez dans $genres uniquement les éléments qui sont des chaînes.
    // Exemple : ['drame', 12] doit devenir ['drame'].

    // Le tableau retourné doit toujours posséder exactement ces trois clés.
    return [
        'q' => $q,
        'annee' => $annee,
        'genres' => $genres,
    ];
}

/**
 * Retourne les films qui satisfont tous les critères actifs.
 *
 * Un critère vide est ignoré : q === '', annee === '' ou genres === [].
 * Les critères actifs se cumulent avec ET. Plusieurs genres sélectionnés
 * représentent des possibilités alternatives : science-fiction OU drame.
 *
 * @param array<int,array<string,mixed>> $films
 * @param array{q:string, annee:string, genres:array<int,string>} $filtres
 * @return array<int,array<string,mixed>>
 */
function filtrerFilms(array $films, array $filtres): array
{
    $resultats = [];

    foreach ($films as $film) {
        // Commencez par considérer chaque critère comme satisfait. Si le
        // filtre correspondant est actif, remplacez la valeur par le résultat
        // de la comparaison.
        $titreCorrespond = true;
        $anneeCorrespond = true;
        $genreCorrespond = true;

        // TODO 1 : si $filtres['q'] n'est pas vide, vérifiez que le titre
        // contient cette recherche sans tenir compte de la casse.
        // Indice : stripos($film['titre'], $filtres['q']) !== false

        // TODO 2 : si $filtres['annee'] n'est pas vide, vérifiez que l'année
        // du film est supérieure ou égale à l'année minimale demandée.

        // TODO 3 : si $filtres['genres'] n'est pas vide, vérifiez que le genre
        // du film figure dans le tableau avec in_array(..., ..., true).

        // TODO 4 : ajoutez le film uniquement lorsque les trois booléens sont
        // vrais. N'utilisez pas unset() sur le tableau $films : construisez le
        // nouveau tableau $resultats progressivement.
    }

    // Aucun résultat se représente par [], sans exception.
    return $resultats;
}
