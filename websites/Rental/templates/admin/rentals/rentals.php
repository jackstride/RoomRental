<table>
    <thead>
        <tr>
            <th>Rental Name</th>
            <th>Rental Room Id</th>
            <th>House ID</th>
            <th>Start Date</th>
            <th>End Date</th>
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
</tr>

<?php 
} ?>

</table>
