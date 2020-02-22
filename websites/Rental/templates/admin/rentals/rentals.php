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
    
    <!-- <td>
    <form class="edit_delete" method="post">

    <input type="hidden" name="id" value="<?=$rental->landlord_id?>" />
    <input type="submit" name="delete" value="delete" />
    
    </form>
    <a style="color: black" href="landlord/edit?id=<?=$rental->landlord_id?>">Edit</a>
    </td>  -->
</tr>

<?php 
} ?>

</table>
