<!-- <button class="add">Add</button> -->

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email Address</th>
        </tr>
    </thead>

<?php

foreach($landlords as $landlord) {?>

<tr>
    <td> <?=$landlord->name?> </td>
    <td> <?=$landlord->address?> </td>
    <td> <?=$landlord->phone_number?> </td>
    <td> <?=$landlord->email_address?> </td>
    <!-- <td><a style='float: right' href='edit-category?id=$landlord->id'>Edit</a></td>
    <td> 
        <form method="post">
        <!-- <input type='hidden' name='id' value='$landlord->id' />
        <input type='submit' name='submit' value='delete' />  -->       
        <!-- </form>  -->
    </td> 
</tr>

<?php 
} ?>

</table>
