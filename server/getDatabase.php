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
    
    public function setUserInfo($nameUser, $passwordUser, $emailUser) {
        $pdo = $this-> getPdoObj();
        $pdoQueries = "INSERT INTO userInfo
        (name, password, email)
        VALUES ('$nameUser', '$passwordUser', '$emailUser')";
        $pdo-> exec($pdoQueries);
    }

    public function setUserInfoUpdate($nameUser, $passwordUser, $emailUser) {
        $pdo = $this-> getPdoObj();
        $pdoQueries = "UPDATE userInfo SET
        name='$nameUser',
        password='$passwordUser',
        email='$emailUser' WHERE id = 1;";
        $pdo-> exec($pdoQueries);
    }
    
    public function deleteUserInfo() {
        $pdo = $this-> getPdoObj();
        $pdoQueries = "DELETE FROM userInfo WHERE id = 1;";
        $pdo-> exec($pdoQueries);  
    }

    public function addProduct($nameProduct, $descProduct, $imgPathProduct, $isSaleProduct, $isPopularProduct) {
        $pdo = $this-> getPdoObj();
        $pdoQueries = "INSERT INTO userProducts
        (name, description, imgPath, isSale, isPopular) values
        ('$nameProduct', '$descProduct', '$imgPathProduct', '$isSaleProduct', '$isPopularProduct')";
        $pdo-> exec($pdoQueries);
    }
    
    public function deleteProduct($ID) {
        $pdo = $this-> getPdoObj();
        $pdoQueries = "DELETE FROM userProducts WHERE id = $ID;";
        $pdo-> exec($pdoQueries);
    }

    public function getDatabaseData($tableType) {
        $pdo = $this-> getPdoObj();
        $pdoQueries = "SELECT * from $tableType";
        $pdoPrepare = $pdo-> prepare($pdoQueries);
        $pdoPrepare-> execute();
        return $pdoPrepare-> fetchAll();
    }
    
    public function countBlogView($ID, $value) {
        $pdo = $this-> getPdoObj();
        $pdoQueries = "UPDATE blog SET view_count = $value WHERE id = '$ID'";
        $pdoPrepare = $pdo-> prepare($pdoQueries);
        $pdoPrepare-> execute();
    }
}