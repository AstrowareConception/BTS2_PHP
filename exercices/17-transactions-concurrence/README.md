# Atelier 17 — Transactions et concurrence

**Durée : 2 heures — Support : données persistantes — Niveau : difficile**

La première séance d'*Alien* ne possède plus que deux places. Le fichier `reserver_naif.php` lit le compteur, attend artificiellement, le décrémente puis insère une réservation. Deux exécutions simultanées peuvent prendre une décision à partir du même état.

## Mission 1 — Reproduire l'incident (25 min)

Ouvrez deux terminaux et lancez presque simultanément deux réservations pour des utilisateurs distincts. Augmentez temporairement l'attente afin de rendre la course visible. Relevez l'ordre des événements, le nombre final de places et les réservations créées.

## Mission 2 — Définir l'invariant (15 min)

Écrivez la règle qui doit toujours rester vraie : aucune séance ne possède un nombre négatif de places et une réservation n'existe que si une place a été effectivement consommée. Identifiez les états intermédiaires invalides.

## Mission 3 — Rendre l'opération atomique (40 min)

Utilisez une transaction et une mise à jour conditionnelle :

```sql
UPDATE seances
SET places_restantes = places_restantes - 1
WHERE id = :id AND places_restantes > 0;
```

Vérifiez le nombre de lignes affectées. Si aucune ligne n'est modifiée, levez une exception métier. Insérez ensuite la réservation et validez. Toute exception déclenche un rollback.

## Mission 4 — Tester le rollback (20 min)

Provoquez un doublon de réservation après le décrément. Prouvez que la transaction restaure le compteur. Ajoutez un journal indiquant début, commit ou rollback sans exposer de secrets.

## Mission 5 — Comparer les solutions (20 min)

Expliquez la différence entre lecture puis écriture, verrou `SELECT ... FOR UPDATE`, mise à jour conditionnelle et contrainte SQL. Indiquez pourquoi la transaction seule ne corrige pas automatiquement un algorithme incorrect.

## Défi

Permettez une réservation de plusieurs places et garantissez que le compteur ne descend jamais sous zéro.

