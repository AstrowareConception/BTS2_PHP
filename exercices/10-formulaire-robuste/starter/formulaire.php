<?php

session_start();
require_once __DIR__ . '/functions.php';

$donnees = normaliserInscription($_POST);
$erreurs = [];

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
    $erreurs = validerInscription($donnees);
    if ($erreurs === []) {
        // Ajouter le message flash, rediriger, puis arrêter le script.
    }
}
?>
<!doctype html>
<html lang="fr">
<head><meta charset="utf-8"><title>Inscription à une séance</title></head>
<body>
<h1>Inscription à une séance</h1>
<!-- Construisez ici le formulaire complet et accessible. -->
</body>
</html>

