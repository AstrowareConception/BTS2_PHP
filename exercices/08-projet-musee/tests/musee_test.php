<?php
require __DIR__.'/../../../tests/Test.php'; require __DIR__.'/../starter/functions.php';
$jeu=[['nom'=>'A','epoque'=>'Antiquité','motsCles'=>['nombres','crible']],['nom'=>'B','epoque'=>'Moyen Âge','motsCles'=>['histoire']],['nom'=>'C','epoque'=>'Antiquité','motsCles'=>['nombres']]];
Test::cas('filtre vide',fn()=>Test::identique($jeu,filtrerParMotCle($jeu,'')));
Test::cas('filtre mot-clé',fn()=>Test::identique([$jeu[0],$jeu[2]],filtrerParMotCle($jeu,'NOMBRES')));
Test::cas('répartition',fn()=>Test::identique(['Antiquité'=>2,'Moyen Âge'=>1],compterParEpoque($jeu)));
Test::cas('niveau',fn()=>Test::identique('Avancé',niveauLisible(3)));
Test::cas('extrait non tronqué',fn()=>Test::identique('texte court',creerExtrait('texte court',4)));
Test::termine();
