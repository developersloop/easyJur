<?php

namespace Controllers\SchedulesController;

use PDOConnection;

class Schedules {
    
    protected $pdo  = null;
    protected $connection = null;

    public function __construct()
    {
        $this->pdo = new PDOConnection();
        $this->connection = $this->pdo->connection();
    }

    public function getSchedules() {
        return $this->connection->query("SELECT nome,description,data_create,data_finished,status from schedules")->fetchAll();
    }
}

?>