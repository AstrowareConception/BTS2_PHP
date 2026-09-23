<?php

require_once __DIR__ . '/preferences.php';

$preferences = validerPreferences($_COOKIE);

// Traitez le POST, écrivez ou supprimez les cookies, puis redirigez.
// Construisez ensuite le formulaire et une prévisualisation des préférences.

