<?php

namespace Controllers\SchedulesController;

use PDOConnection;

class Schedules {
    
    protected $pdo  = null;
    protected $connection = null;
    protected $isEdit = false;

    public function __construct()
    {
        $this->pdo = new PDOConnection();
        $this->connection = $this->pdo->connection();
    }

    public function getSchedules() {
        return $this->connection->query("SELECT id,nome,description,data_create,data_finished,status from schedules")->fetchAll();
    }
    
    public function formatSchedules($schedules) {
        return [
            'id' => $schedules['id'],
            'nome' => $schedules['nome'],
            'description' => $schedules['description']
        ];
    }

    public function editSchedule($schedule) {

        $this->isEdit = true;
        if(isset($schedule['idd'])) {
            $id = $schedule['idd'];
            $nome = $schedule['nome'];
            $descricao = $schedule['description'];
    
            $sql = "UPDATE schedules SET nome=?, description=?, data_finished=now(), status='Concluído' WHERE id=?";
            
            $stmt= $this->connection->prepare($sql);
            $stmt->execute([$nome, $descricao, $id]);
        }
    }

    public function storeSchedule($schedule) {
        
        if(isset($schedule['nome']) && isset($schedule['description']) && !isset($_REQUEST['edit'])) {
            $nome = $schedule['nome'];
            $descricao = $schedule['description'];
            $data = [
                'nome' => $nome,
                'description' => $descricao,
                'status' => 'Pendente'  
            ];
            $stmt = $this->connection->prepare("SELECT * FROM schedules where nome=?") ;
            $stmt->execute([$nome]);  

            $count = $stmt->rowCount();

            $sql = "INSERT INTO schedules (nome,description,status,data_create) values(:nome,:description,:status, now())";

            $stmt= $this->connection->prepare($sql);
            $stmt->execute($data);

            header("Location: /schedules"); 
       }
       
    }

    public function deleteSchedule() {
        $id = $_REQUEST['id'];
        
        $stmt = $this->connection->prepare("SELECT * FROM schedules where id=?");
        $stmt->execute([$id]);  

        $count = $stmt->rowCount();

        if($count > 0) {
            $sql = "DELETE FROM schedules WHERE id=?";
            $this->connection->prepare($sql)->execute([$id]);
        }
    }
}

?>