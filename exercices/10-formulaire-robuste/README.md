# Atelier 10 — Construire un formulaire robuste

**Durée : 2 h 15 — Support : PHP interactif — Niveau : intermédiaire**

Vous recevez le formulaire d'inscription d'une séance de ciné-club. Il fonctionne dans le cas idéal, mais perd les valeurs en cas d'erreur, accepte des données incohérentes et réaffiche directement les saisies. Votre mission consiste à en faire un véritable flux serveur.

## Règles métier

- Le nom contient de 2 à 60 caractères après `trim`.
- L'adresse électronique doit posséder une forme valide.
- L'âge doit être un entier compris entre 15 et 120.
- La séance appartient à la liste blanche `alien`, `metropolis`, `parasite`.
- Le nombre de places vaut 1, 2 ou 3.
- Le commentaire reste facultatif et limité à 300 caractères.

## Étape 1 — Établir la matrice de tests (20 min)

Avant de modifier le code, complétez `CAS_DE_TEST.md` : cas nominal, chaque borne exacte, une valeur juste hors borne, champ absent, tableau envoyé à la place d'une chaîne et charge XSS. Précisez le résultat attendu.

## Étape 2 — Normaliser et valider (45 min)

Complétez `normaliserInscription` puis `validerInscription`. La normalisation ne décide pas si la donnée est acceptable. La validation retourne un tableau associatif d'erreurs, une clé par champ. Une requête malformée ne doit pas provoquer de `TypeError` non géré.

## Étape 3 — Réafficher sans XSS (35 min)

Complétez le formulaire afin de conserver les valeurs valides et d'afficher chaque erreur près de son champ. Protégez le contenu des champs, les options sélectionnées et le commentaire avec `htmlspecialchars` au moment de produire le HTML.

Testez notamment comme nom : `<img src=x onerror=alert(1)>`. Le texte peut être rejeté par la longueur ou réaffiché comme texte, mais ne doit jamais devenir une balise exécutée.

## Étape 4 — Post/Redirect/Get (25 min)

Après une inscription valide, stockez un message flash en session, redirigez vers `confirmation.php`, puis supprimez le message après affichage. Un rafraîchissement ne doit pas renvoyer le formulaire.

## Recette (10 min)

Testez directement une requête POST falsifiée, sans passer par le formulaire. Vérifiez qu'aucune donnée invalide n'est considérée comme fiable et qu'aucun en-tête n'est envoyé après du HTML.

## Défi

Ajoutez un champ de préférences sous forme de cases `preferences[]`, avec validation par liste blanche et réaffichage exact des cases cochées.

