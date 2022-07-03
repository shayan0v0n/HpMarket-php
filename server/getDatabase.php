<?php

require_once 'setupDB.php';

class GetDatabase extends SetupDB {
    public function getCustomData($tableType, $basedOn, $ID) {
        $pdo = $this-> getPdoObj();
        $pdoQueries = "SELECT * from $tableType WHERE $basedOn = '$ID'";
        $pdoPrepare = $pdo-> prepare($pdoQueries);
        $pdoPrepare-> execute();
        return $pdoPrepare-> fetchAll();
    }
    
    public function setProductComment($commentName, $commentTitle, $commentID) {
        $pdo = $this-> getPdoObj();
        $pdoQueries = "INSERT INTO productComments
        (name, comment, productID)
        VALUES ('$commentName', '$commentTitle', $commentID)";
        $pdo-> exec($pdoQueries);
    }
}