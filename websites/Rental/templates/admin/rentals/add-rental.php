<?php 
foreach($tenants as $tenant){
    var_dump($tenant->first_name);
    }
    ?>


<form method="post">

<label for="tenant_id"> Tenant </label>
<select type="text" name="rental[tenant_id]">
<?php
foreach($tenants as $tenant) {?>
<option value="<?=$tenant->tenant_id?>"><?=$tenant->first_name . " " . $tenant->last_name?></option>
<?php 
} ?>
</select>

<label for="room_id"> Room </label>
<select type="text" name="rental[room_id]">
<?php
foreach($rooms as $room) {?>
<option value="<?=$room->room_id?>"><?=$room->room_id?></option>
<?php 
} ?>
</select>


<label for="occupancy_start_date"> Start Date </label>
<input type="date" name="rental[occupancy_start_date]"/>

<label for="occupancy_end_date"> End Date </label>
<input type="date" name="rental[occupancy_end_date]"/>



<input type="submit" name="submit" value="Add Rental"/>
</form>
