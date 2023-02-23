<?php

use Controllers\SchedulesController\Schedules;

    $schedules = new Schedules();
    $empty = !is_array($schedules->getSchedules());
    $arr = $schedules->getSchedules();
?>
<div class="schedules-list">
    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" class="f-size">Nome</th>
            <th scope="col" class="f-size">Descrição</th>
            <th scope="col" class="f-size">Data Criação</th>
            <th scope="col" class="f-size">Data Conclusão</th>
            <th scope="col" class="f-size">Status</th>
            <th scope="col" class="f-size">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if($empty)  {?>
            <tr>
                <td colspan="6" class="text-center">Não existe agendas disponíveis.</td>
            </tr>
        <?php }?>
        <?php if(!$empty)  {?>
            <?php foreach($arr as $key=>$value): ?>
            <tr>
                <?php foreach (array_unique($value) as $key => $val): ?>
                    <td class="f-size"><?= $val; ?></td>
                <?php endforeach; ?>
                <td>
                    <i class="fa-solid fa-pencil" style="cursor: pointer;"></i>&nbsp;&nbsp;
                    <i class="fa-solid fa-trash" style="cursor: pointer;"></i>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php }?>
        
    </tbody>
    </table>
</div>