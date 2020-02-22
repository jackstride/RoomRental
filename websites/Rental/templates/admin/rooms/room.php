
<table>
    <thead>
        <tr>
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
    <td> <?=$room->house_id?> </td>
    <td> <?=$room->room_type?> </td>
    <td> <?=$room->monthly_rental_figure?> </td>
    <td> <?=$room->deposit_figure?> </td>
    <td> <?=$room->description?> </td>
    <td> <?=$room->is_furnished ? "Yes" : "No" ?> </td>
    <td> <?=$room->is_ensuite ? "Yes" : "No" ?> </td>
    <td> <?=$room->is_occupied ? "Yes" : "No" ?> </td>

</tr>


<?php 
} ?>

</table>
