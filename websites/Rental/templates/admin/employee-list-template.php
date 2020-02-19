<?php

require "admin-panel.php";

?>

<section class="right">

<h2>Employee List</h2>
    <form method="post">
    <table>
    <thead>
    <th>Name</th>
    <th>Email</th>
    <th> Edit Permissions </th>
    <th>Edit User</th>
    <th>Delete User</th>
    </thead>
    <tbody>

    <?php foreach($users as $user) {?>

    <tr>

    <td><?=$user->name?></td>

    <td><?=$user->email?></td>

    <td><a href="permissions?id=<?=$user->id?>"> Edit </a></td>

    <td><a href="edit-users?id=<?=$user->id?>"> Edit </a></td>

    <td>
    <input type="hidden" name="id" value="<?=$user->id?>" /> 
    <input type="submit" name="delete" value="delete" />
     </td>

    </tr>

    <?php } ?>
    </tbody>
    </table>
    <form>









</section>