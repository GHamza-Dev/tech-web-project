
<?php
require '../../config/db_config.php';

$db = new Db();
echo json_encode($db->getsolution());