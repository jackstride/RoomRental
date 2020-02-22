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
            <th> House ID </th>
            <th>Address</th>
            <th>Number of Floors</th>
            <th>Number of Rooms</th>
            <th>Number of Rooms Available</th>
            <th>Wifi Available</th>
            <th>LandLord</th>
            <th>Modify</th>
        </tr>
    </thead>

<?php

foreach($houses as $house) {?>

<tr>
    <td> <?=$house->house_id?></td>
    <td> <?=$house->address?> </td>
    <td> <?=$house->number_of_floors?> </td>
    <td> <?=$house->number_of_rooms?> </td>
    <td> test </td>
    <td> <?= $house->wifi_available ? "Yes" : "No" ?> </td>
    <td> <?=$house->getName($house->landlord_id)?> </td>
    <td>
    <form class="edit_delete" method="post">

    <input type="hidden" name="id" value="<?=$house->house_id?>" />
    <input type="submit" name="Delete" value="Delete" />
    
    </form>
    <a class="edit" href="landlord/edit?id=<?=$house->house_id?>">Edit</a>
    </td> 
</tr>

<?php 
} ?>

</table>
