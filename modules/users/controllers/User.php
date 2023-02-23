<?php

namespace Controllers\UserController;

use Interfaces\User\UserInterface;
use PDOConnection;

class User implements UserInterface{

    protected $pdo  = null;
    protected $connection = null;

    public function __construct()
    {
        session_start();

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

    public function storeUser($user) {
        if(isset($user['phone']) && isset($user['email']) && isset($user['password'])) {
            $phone = $user['phone'];
            $email = $user['email'];
            $password = $user['password'];

            $data = [
                'phone' => $phone,
                'email' => $email,
                'password' => md5($password),
                'token' => md5($password) 
            ];

            $sql = "INSERT INTO users (phone,email,password,token) values(:phone,:email,:password,:token)";

            $stmt= $this->connection->prepare($sql);
            $stmt->execute($data);
            

            session_destroy();
            header("Location: /");

       }
    }
}

?>