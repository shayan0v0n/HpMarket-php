<?php

require_once 'setupDB.php';

class GetDatabase extends SetupDB {
    public function getCustomData($tableType, $basedOn, $ID) {
        $pdo = $this-> getPdoObj();
        $pdoQueries = "SELECT * from $tableType WHERE $basedOn = $ID";
        $pdoPrepare = $pdo-> prepare($pdoQueries);
        $pdoPrepare-> execute();
        return $pdoPrepare-> fetchAll();
    }
}