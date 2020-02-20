<!-- <button class="add">Add</button> -->

<table>
    <thead>
        <tr>
            <th>Type of Room</th>
            <th>Monthyl Amount</th>
            <th>Deposit Cost</th>
            <th>Description</th>
            <th>Condition of Room</th>
            <th>Modify</th>
        </tr>
    </thead>

<?php

foreach($rooms as $room) {?>

<tr>
    <td> <?=$room->room_type?> </td>
    <td> <?=$room->monthly_rental_figure?> </td>
    <td> <?=$room->deposit_figure?> </td>
    <td> <?=$room->description?> </td>
    <td> <?=$room->room_condition?> </td>
    <!-- <td>
    <form class="edit_delete" method="post">

    <input type="hidden" name="id" value="<?=$room->landlord_id?>" />
    <input type="submit" name="delete" value="delete" />
    
    </form>
    <a style="color: black" href="landlord/edit?id=<?=$room->landlord_id?>">Edit</a>
    </td>  -->
</tr>

<?php 
} ?>

</table>
