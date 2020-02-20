<!-- <button class="add">Add</button> -->

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>First Name</th>
            <th>Surname</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Employer Details</th>
            <th>Rooms Available</th>
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
    <td> <?=$tenant->room_availability?> </td>
    <!-- <td>
    <form class="edit_delete" method="post">

    <input type="hidden" name="id" value="<?=$tenant->landlord_id?>" />
    <input type="submit" name="delete" value="delete" />
    
    </form>
    <a style="color: black" href="landlord/edit?id=<?=$tenant->landlord_id?>">Edit</a>
    </td>  -->
</tr>

<?php 
} ?>

</table>
