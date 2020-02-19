<?php
require "admin-panel.php";
?>

<section class="right">

<?php require "errors.php" ?>

    <form method="post">

    <label>Your email address</label>
    <input name="user[email]" id="email" type="text" />

<label>Your name</label>
<input name="user[name]" id="name" type="text" />

<label>Password</label>
<input type="password" name="user[password]" />

<input type="submit" name="submit" value="Register account" />

</form>



</section>