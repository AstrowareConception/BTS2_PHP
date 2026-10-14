# Recette croisée du catalogue

Pour chaque ligne, noter le statut, le résultat visible et l'éventuelle anomalie.

| Cas | Manipulation | Résultat attendu |
|---|---|---|
| Liste | `GET /films` | 5 films triés par titre |
| Recherche trouvée | `GET /films?q=alien` | Alien uniquement |
| Recherche vide | `GET /films?q=introuvable` | liste vide expliquée |
| Fiche existante | `GET /films/1` | statut 200 et titre |
| Fiche absente | `GET /films/9999` | statut 404 |
| Identifiant invalide | `GET /films/chat` | statut 400 |
| Ajout valide | titre, année et note valides | statut 303 puis fiche créée |
| Ajout vide | titre composé d'espaces | statut 422, valeur conservée |
| XSS stockée | titre `<script>alert(1)</script>` | aucun script exécuté |
| Injection SQL | recherche `' OR 1=1 --` | aucune erreur, aucun contournement |

## Fiche d'anomalie

- Requête ou manipulation :
- Résultat obtenu :
- Résultat attendu :
- Hypothèse :
- Correction vérifiée :
