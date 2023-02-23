<?php

namespace Interfaces\User;
interface UserInterface {
    public function __construct();
    public function findUser($id);
}
?>