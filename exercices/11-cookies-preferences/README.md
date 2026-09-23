# Atelier 11 — Cookies et préférences contrôlées

**Durée : 1 h 30 — Support : PHP interactif — Niveau : intermédiaire**

Le CinéClub veut mémoriser le thème, la densité d'affichage et le nombre de films par page. Ces préférences ne sont pas secrètes, mais elles restent entièrement modifiables par le navigateur.

## Mission 1 — Définir le contrat (15 min)

Les seules valeurs admises sont : thème `clair` ou `sombre`, densité `aeree` ou `compacte`, pagination 6, 12 ou 24. Complétez `validerPreferences` afin qu'une préférence absente ou falsifiée revienne à une valeur sûre.

## Mission 2 — Écrire les cookies (30 min)

Construisez un formulaire POST. Après validation, appelez `setcookie` avec une durée de 30 jours et des options explicites : `path`, `secure`, `httponly`, `samesite`. En environnement HTTP local, rendez l'option `secure` configurable sans supprimer l'explication de son usage en production.

Redirigez après l'écriture : la nouvelle valeur n'apparaît dans `$_COOKIE` qu'à la requête suivante.

## Mission 3 — Lire, appliquer, supprimer (25 min)

Lisez les cookies dans un tableau, repassez-les par `validerPreferences`, puis appliquez uniquement des classes CSS issues de votre liste blanche. Ajoutez un bouton « Réinitialiser » qui expire les trois cookies avec le même chemin.

## Mission 4 — Attaque manuelle (20 min)

Dans les outils du navigateur, remplacez le thème par `"><script>alert(1)</script>`. Observez le résultat et expliquez pourquoi la liste blanche protège mieux qu'une confiance accordée au cookie. Documentez aussi la différence entre cookie de session et cookie persistant.

## Défi

Regroupez les préférences dans un unique cookie JSON, puis évaluez honnêtement les avantages et les inconvénients de ce choix. Toute donnée décodée reste à valider.

