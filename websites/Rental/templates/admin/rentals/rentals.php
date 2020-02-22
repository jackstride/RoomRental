<?php 
if($prompt) { ?>

<form method="post">
<input type='hidden' name='tenant_id' value="<?=$tenant?>" />
<input type="hidden" name='id' value="<?= $val?>" />
<input class="warning" type="submit" name="p_delete" value="delete" /> 
</form>

<?php } ?>


<table>
    <thead>
        <tr>
            <th>Rental Name</th>
            <th>Rental Room Id</th>
            <th>House ID</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th> Modify </th>
        </tr>
    </thead>

<?php

foreach($rentals as $rental) {?>

<tr>
    <td> <?=$rental->first_name . " " . $rental->last_name?> </td>
    <td> <?=$rental->room_id?> </td>
    <td> <?=$rental->house_id?> </td>
    <td> <?=$rental->occupancy_start_date?> </td>
    <td> <?=$rental->occupancy_end_date?> </td>
    <td>
    <form class="edit_delete" method="post">
    <input type="hidden" name="id" value="<?=$rental->rental_id?>" />
    <input type="hidden" name="tenant_id" value="<?=$rental->tenant_id?>" />
    <input type="submit" name="delete" value="delete" />
    </form>
    <a class="edit" href="landlord/edit?id=<?=$rental->rental_id?>">Edit</a>
    </td> 
</tr>

<?php 
} ?>

</table>
