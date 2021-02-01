
<?php
require '../../config/db_config.php';

$db = new Db();
$list  = [];
echo json_encode($db->getDevAdmin());


