<!-- <button class="add">Add</button> -->

<table>
    <thead>
        <tr>
            <th>Start Data</th>
            <th>End Date</th>
            <th>Modify</th>
        </tr>
    </thead>

<?php

foreach($rentals as $rental) {?>

<tr>
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
