<?php

use Controllers\SchedulesController\Schedules;

    $schedules = new Schedules(); 
    $empty = !is_array($schedules->getSchedules());
    $listSchedules = $schedules->getSchedules();
    if(isset($_REQUEST['edit']))  header("refresh: 0");

?>
<div class="schedules-list">
    <div class="head">
        <button type="submit" class="btn btn-primary f-size" data-toggle="tooltip" data-placement="top" title="Download Excel">
            <i   class="fa-solid fa-file-excel"></i>            
        </button>&nbsp;
        <button type="submit" class="btn btn-primary f-size" data-toggle="tooltip" data-placement="top" title="Download pdf">
            <i   class="fa-solid fa-file-pdf"></i>            
        </button>&nbsp;
        <buton class="btn btn-primary f-size" data-toggle="modal" data-target="#cadastrarModal" title="Cadastrar Agenda">
            <i class="fa-solid fa-store"></i>
        </buton>
        <?php include 'modal/create-schedule.php' ?>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="f-size">#</th>
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
                <?php foreach($listSchedules as $key=>$schedule): ?>
                <tr id="tr-<?= $schedules->formatSchedules(array_unique($listSchedules[$key]))['id'] ?>">
                    <?php foreach (array_unique($schedule) as $k => $value): ?>
                        <td class="f-size" id="<?= $k == 'id' ? "td-$value" : '' ?>"><?= $value ?? '-' ?></td>
                    <?php endforeach; ?>
                    <td class="actions" style="margin: 0;">
                        <i class="fa-solid fa-pencil" style="cursor: pointer;" data-toggle="modal" data-target="#editUser-<?php echo $key; ?>"></i>&nbsp;&nbsp;                        
                        <form action="<?php  $schedules->deleteSchedule(); ?>" method="POST" id="<?= $k ?>">
                            <input type="hidden" value="<?= $schedules->formatSchedules(array_unique($listSchedules[$key]))['id'] ?>" name="id">
                            <button type="submit" class="btn fa-solid fa-trash" style="cursor: pointer;" role="button"></button>
                        </form>
                        <?php include 'modal/edit-schedule.view.php' ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php }?>
        </tbody>
    </table>
</div>
<script>
    let id = <?= $_REQUEST['id']?>;
    
    if(id) document.getElementById(`tr-${id}`).remove()
                
    
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

</script>