<?php 

class Db {
    private $host = "srv480.hstgr.io";
    private $user = "u216558363_floredrop";
    private $password = "Floredrop200510021216";
    private $dbName = "u216558363_floredrop";

    public function connection(){
        try {
            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbName.";charset=utf8mb4";
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}