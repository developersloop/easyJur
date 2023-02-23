<?php

namespace Controllers\UserController;

use Interfaces\User\UserInterface;
use PDOConnection;

class User implements UserInterface{

    protected $pdo  = null;
    protected $connection = null;

    public function __construct()
    {
        $this->pdo = new PDOConnection();
        $this->connection = $this->pdo->connection();
    }

    public function findUser($token) {
        return $this->connection->query("SELECT * from users where token = $token")->fetch();
    }
    public function login($request) {
        $token = md5($request['password']);
        return  is_array($this->connection->query("SELECT * from users where token = '$token'")->fetch());
   
    }
}

?>