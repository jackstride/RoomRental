<!-- <button class="add">Add</button> -->

<table>
    <thead>
        <tr>
            <th>House Address</th>
            <th>Tenant</th>
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
    <td> <?=$room->room_id?> </td>
    <td> <?=$room->room_type?> </td>
    <td> <?=$room->monthly_rental_figure?> </td>
    <td> <?=$room->deposit_figure?> </td>
    <td> <?=$room->description?> </td>
    <td> <?= $room->furnished ? "Yes" : "No" ?> </td>
    <td> <?=$room->ensuite ? "Yes" : "No" ?> </td>
    <td> <?=$room->occupied ? "Yes" : "No" ?> </td>
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
