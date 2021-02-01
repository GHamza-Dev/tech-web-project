<?php
    require 'config/db_config.php';
    $db = new Db();
    if (isset($_POST['idChal'])) {
        $db->insertDownload($_POST['idChal'],$_POST['idDev']);
    }