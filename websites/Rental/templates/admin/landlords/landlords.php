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
            <th>First Name</th>
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
        <div class="modify">
    <form class="edit_delete" method="post">

    <input type="hidden" name="id" value="<?=$landlord->landlord_id?>" />
    <input type="submit" name="delete" value="delete" />
    
    </form>
    <a class="edit" href="landlord/edit?id=<?=$landlord->landlord_id?>">Edit</a>
    </div>
    </td> 
</tr>

<?php 
} ?>

</table>
