<?php
    require 'db_config.php';
    $db = new Db();
    echo json_encode($db->getsolution());