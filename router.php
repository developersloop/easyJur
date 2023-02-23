<?php

include './modules/interfaces/UserInterface.php';
include './modules/users/controllers/User.php';
include './modules/schedules/controllers/Schedules.php';

use Controllers\SchedulesController\Schedules;
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
                    include './modules/schedules/view/schedule.view.php';                    
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
        if($_SERVER['REQUEST_URI'] == '/schedules' && !isset($_SESSION['token'])) {
            session_destroy();
            header("Location: /"); 
        }
    }
}
?>