<?php

include __DIR__.'/../vendor/autoload.php';

// We draaien deze shit op dit bestandje
// 1. Check of we op de test omgeving of de arena moeten gaan
// 2. Haal de game op
// 3. Verdeel de info over de classes en shit
// 4. Begin de game enzo

$manager = new \AD9001\GameState\Manager();
$manager->go($argv);
