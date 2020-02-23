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
            <th>Title</th>
            <th>First Name</th>
            <th>Surname</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Employer Details</th>
            <th>Occupying Room</th>
            <th>Modify</th>
        </tr>
    </thead>

<?php

foreach($tenants as $tenant) {?>

<tr>
    <td> <?=$tenant->title?> </td>
    <td> <?=$tenant->first_name?> </td>
    <td> <?=$tenant->last_name?> </td>
    <td> <?=$tenant->mobile_phone_number?> </td>
    <td> <?=$tenant->email_address?> </td>
    <td> <?=$tenant->employer_details?> </td>
    <td> <?=$tenant->is_renting ? "yes Room ID - " . $tenant->getRoomNumber($tenant->tenant_id) : "No" ?></td>
    
    <td>
    <div class="modify">
    <form class="edit_delete" method="post">

    <input type="hidden" name="id" value="<?=$tenant->tenant_id?>" />
    <input type="submit" name="Delete" value="delete" />
    
    </form>
    <a class="edit" href="landlord/edit?id=<?=$tenant->tenant_id?>">Edit</a>
</div>
    </td> 
</tr>

<?php 
} ?>

</table>
