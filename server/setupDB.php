<?php

require_once 'queriesDB.php';

class SetupDB extends QueriesDB {
    private $hostInfo = [
        "serverName"=> "localhost",
        "dbName"=> "phphp",
        "userName"=> "root",
        "password"=> ""
    ];
    private $error = [];

    public function __construct() {
        // check xampp run or not
        if ($this-> checkApacheRun()) {
            if ($this-> checkDbExist()) { // check db exist
                // createDatabase
                // $this-> createDatabase();
            }else {
                // create db if be false => createDatabase
                $pdo = $this-> checkApacheRun();
                $sqlQuery = "CREATE DATABASE phphp";
                $pdo-> exec($sqlQuery);
                $this-> createDatabase();
            }
        }
    }

    public function checkErrorExist($errorType) {
        return array_key_exists($errorType, $this-> error) ? true : false;
    }

    public function getPdoObj() { // Create PDO Obj And Check Db Exist
        try {
            $serverName = $this->hostInfo['serverName'];
            $dbName = $this->hostInfo['dbName'];
            $userName = $this->hostInfo['userName'];
            $password = $this->hostInfo['password'];
            $pdo = new PDO("mysql:host=$serverName;dbname=$dbName",
             $userName,
             $password);

             return $pdo;
        }catch(Exception $err) {
            $this-> error += ["database" => $err-> getMessage()];
            return false;
        }
    }

    public function checkApacheRun() { // Check Apache Run
        try {
            $serverName = $this->hostInfo['serverName'];
            $userName = $this->hostInfo['userName'];
            $password = $this->hostInfo['password'];
            $pdo = new PDO("mysql:host=$serverName",
             $userName,
             $password);
    
             return $pdo;
        }catch(Exception $err) {
            $this-> error += ["apache" => $err-> getMessage()];
            return false;
        }
    }

    public function checkDbExist() {
        $pdo = $this-> getPdoObj();
        if ($pdo) {
            return true;
        }else {
            return false;
        }
    }

    public function createDatabase() {
        // create tables
       $this-> createTables($this-> getPdoObj());
        // add all localData with code...
        $this-> insertBlogData($this-> getPdoObj());
        $this-> insertCategoriesData($this-> getPdoObj());
        $this-> insertProductsData($this-> getPdoObj());
    }

}