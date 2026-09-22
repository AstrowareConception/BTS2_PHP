<?php
$films=[['titre'=>'  Alien ','duree'=>117,'prix'=>3.99,'disponible'=>true],['titre'=>'Metropolis','duree'=>153,'prix'=>4.5,'disponible'=>false]];
$total=0; foreach($films as $film){$total+=$film['duree'];if($film['disponible']){echo '<p>'.trim($film['titre']).' — '.number_format($film['prix'],2,',',' ').' €</p>';}}
echo '<p>Moyenne : '.($total/count($films)).' minutes</p>';
// Réorganisez ce script sans changer son résultat.

