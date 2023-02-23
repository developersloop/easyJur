<?php

include './modules/interfaces/UserInterface.php';
include './modules/users/controllers/User.php';
include './modules/schedules/controllers/Schedules.php';

use Controllers\UserController\User;

session_start();

class Router {

    public function getTemplate($router) {
        if(isset($_SERVER['REQUEST_URI'])) {
            switch ($_SERVER['REQUEST_URI']) {
                case '/':
                    include './modules/users/view/users.view.php';                    
                break;
                case '/schedules':
                    if($this->guard()) include './modules/schedules/view/schedule.view.php';    
                    else  header("Location: /");       
                break;
                case '/logout?':
                    $this->logout();                 
                break;
            }
            
        }
    }

    public function interceptRequest($from) {
        switch ($from) {
            case 'login':
                if (isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
                    $users = new User();
                    if($users->login($_REQUEST)) {
                        $_SESSION["token"] = md5($_REQUEST['password']);
                        header("Location: /schedules");
                        die();
                    }
                }
            break;
        }
        return;
    }

    public function logout() {
        session_destroy();
        header("Location: /");
    }

    public function guard() {
        return isset($_SESSION['token']);     
    }

    public function storeUser() {
        $users = new User();
        $users->storeUser($_REQUEST);
    }
}
?>