<?php 
if($prompt) { ?>

<form method="post">
<input type="hidden" name='id' value="<?= $val?>" />
<input class="warning" type="submit" name="p_delete" value="delete" /> 
</form>

<?php } ?>


<table>
    <thead>
        <tr>
            <th> Room ID </th>
            <th>House Address</th>
            <th>Type of Room</th>
            <th>Monthly Amount</th>
            <th>Deposit Cost</th>
            <th>Description</th>
            <th>Furnashed</th>
            <th>Ensuite</th>
            <th>occupied</th>
            <th>Modify</th>
        </tr>
    </thead>

<?php

foreach($rooms as $room) {?>
<tr>
    <td> <?=$room->room_id?> </td>
    <td> <?=$room->house_id?> </td>
    <td> <?=$room->room_type?> </td>
    <td> <?=$room->monthly_rental_figure?> </td>
    <td> <?=$room->deposit_figure?> </td>
    <td> <?=$room->description?> </td>
    <td> <?=$room->is_furnished ? "Yes" : "No" ?> </td>
    <td> <?=$room->is_ensuite ? "Yes" : "No" ?> </td>
    <td> <?=$room->is_occupied ? "Yes" : "No" ?> </td>
    <td>
    <form class="edit_delete" method="post">
    <input type="hidden" name="id" value="<?=$room->room_id?>" />
    <input type="submit" name="delete" value="delete" />
    </form>
    <a class="edit" href="landlord/edit?id=<?=$room->room_id?>">Edit</a>
    </td>

</tr>


<?php 
} ?>

</table>
