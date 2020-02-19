<?php
    require 'admin-panel.php';
?>

<section class="right">

<?php foreach($users as $user) { 

    ?>

    <h2>Edit <?=$user->name?>’s Permissions</h2>

    <?php
    if(isset($_GET['table']))
    {
        echo "<h2> You are editing the " . $_GET['table'] . " permissions</h2>";


    }
    ?>

    <form method="post">

    <select name="table">
    <option selected disabled hidden>Select Permissions Table</option>
    <option value="furniture">Furniture</option>
    <option value="category">Category</option>
    <option value="news">News</option>
    <option value="staff">Staff</option>
    </select>

    <input type="submit" name="change">    

    <?php foreach ($permissions as $name => $value) {?>

    <div>

    <label><?=$name?></label>
    <input name="permissions[]" type="checkbox" value="<?=$value?>"

    <?php if ($user->hasPermission($value)):

        echo 'checked'; endif; ?> />

    </div>

    <?php } ?>

    <input type="submit" name="submit" value="Submit" />

</form>



<?php  }?>


</section>