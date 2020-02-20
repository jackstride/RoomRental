<!-- <button class="add">Add</button> -->

<table>
    <thead>
        <tr>
            <th>First Namee</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>Modify</th>
        </tr>
    </thead>

<?php

foreach($landlords as $landlord) {?>

<tr>
    <td> <?=$landlord->first_name?> </td>
    <td> <?=$landlord->last_name?> </td>
    <td> <?=$landlord->address?> </td>
    <td> <?=$landlord->phone_number?> </td>
    <td> <?=$landlord->email_address?> </td>
    <td>
    <form class="edit_delete" method="post">

    <input type="hidden" name="id" value="<?=$landlord->landlord_id?>" />
    <input type="submit" name="delete" value="delete" />
    
    </form>
    <a style="color: black" href="landlord/edit?id=<?=$landlord->landlord_id?>">Edit</a>
    </td> 
</tr>

<?php 
} ?>

</table>
