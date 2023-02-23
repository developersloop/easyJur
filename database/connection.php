<?php

class PDOConnection {

    protected $servername = "127.0.0.1";
    protected $username = "vitor";
    protected $password = "dualcore";

    protected $connection = null;

    public function connection() {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=easyJur", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::FETCH_ASSOC);
            return $conn;
          } catch(PDOException $e) {
            echo "Connection failed: {$e->getMessage()}";
          }
    }
}

?>