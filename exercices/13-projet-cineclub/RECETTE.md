# Recette du CinéClub personnel

| Cas | Résultat attendu | Résultat observé | Statut |
|---|---|---|---|
| GET sans filtre | tous les films | | |
| GET avec deux filtres | intersection correcte | | |
| Paramètre de tri falsifié | valeur sûre appliquée | | |
| Cookie de thème falsifié | thème par défaut | | |
| Ajout favori non connecté | accès refusé ou redirection | | |
| Ajout favori sans CSRF | réponse 403 | | |
| Ajout deux fois | aucun doublon | | |
| Favori inconnu | erreur contrôlée | | |
| Charge XSS dans la recherche | texte inoffensif | | |
| Déconnexion puis page privée | accès refusé | | |

## Synthèse

- Validation :
- Autorisation :
- Échappement :
- Difficulté principale et diagnostic :
