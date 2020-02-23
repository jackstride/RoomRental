<div class="edit_form">

    <div class="form_labels">
        <label> Rental Name </label>
        <label> Rental Room ID </label>
        <label> Start Date </label>
        <label> End Date </label>
        <label> Save </label>
    </div>

    <form class="form_edit" method="post">

    <?php foreach($rentals as $rental) { $tenant_id=$rental->tenant_id; $t_room = $rental->room_id; ?>

    <select name='rental[tenant_id]'>
    <?php foreach($tenants as $tenant) {?>
    <option <?=$tenant->tenant_id == $tenant_id ? "selected ='true'" : "" ?> value="<?=$tenant->tenant_id?>">
    <?= $tenant->first_name . " " . $tenant->last_name ?>
    </option>
    <?php } ?>
    </select>


    <select name='rental[room_id]'>
    <?php foreach($rooms as $room) {?>
    <option <?=$room->room_id == $t_room ? "selected ='true'" : "" ?> value="<?=$room->room_id?>">
    <?= $room->room_id?>
    </option>
    <?php } ?>
    </select>

    <input type="date" name='rental[occupancy_start_date]' value="<?=$rental->occupancy_start_date?>">
    <input type="date" name='rental[occupancy_end_date]' value="<?=$rental->occupancy_end_date?>">
        
    
        <?php } ?>
        <input type="hidden" name="id" value="<?=$id?>"></input>
        <input type="submit" name="Submit" value="Save"></input>
    </form>
</div>