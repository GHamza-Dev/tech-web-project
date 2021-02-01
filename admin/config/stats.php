


<?php
require '../../config/db_config.php';

$db = new Db();
$stats = [];
$i = $db->getNbrChallenge()[0];
array_push($stats,$i);

$i = $db->getNbrSolution()[0];
array_push($stats,$i);

$i = $db->getNbrDev()[0];
array_push($stats,$i);

echo json_encode($stats);