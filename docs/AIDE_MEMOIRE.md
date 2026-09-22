# Aide-mémoire PHP

Ce document rappelle la syntaxe nécessaire aux ateliers. Il ne remplace ni le cours ni la documentation officielle.

## Variables et affichage

```php
$titre = "Alien";
$annee = 1979;
echo $titre;
```

Dans du HTML :

```php
<h2><?= htmlspecialchars($titre) ?></h2>
```

## Conditions

```php
if ($note >= 8) {
    $mention = "Excellent";
} elseif ($note >= 6) {
    $mention = "Bon";
} else {
    $mention = "À redécouvrir";
}
```

Comparaisons strictes : `===` et `!==`. Opérateurs logiques : `&&`, `||` et `!`.

## Boucles

```php
for ($i = 1; $i <= 5; $i++) {
    echo $i;
}

while ($condition) {
    // traitement et évolution vers la fin
}

foreach ($films as $film) {
    echo $film["titre"];
}
```

## Tableaux

```php
$film = [
    "titre" => "Alien",
    "annee" => 1979,
    "note" => 8.7,
];

$films = [$film];
```

Fonctions utiles : `count`, `array_column`, `in_array`, `array_key_exists`, `array_unique`, `array_merge`, `sort`, `array_slice`.

## Textes

Fonctions utiles : `trim`, `mb_strlen`, `mb_strtolower`, `mb_substr`, `mb_strpos`, `str_contains`, `explode`, `implode`, `htmlspecialchars`.

## Fonctions

```php
function preparerTitre(string $titre): string
{
    return trim($titre);
}
```

Une fonction de calcul retourne une valeur. Elle évite en général d'afficher directement avec `echo`, afin que son résultat reste réutilisable et testable.

## Organisation

```php
require __DIR__ . "/data/donnees.php";
require_once __DIR__ . "/functions.php";
```

Conservez les données brutes dans un fichier, les traitements dans un autre et l'affichage dans `index.php`.

