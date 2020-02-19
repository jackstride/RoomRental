<?php 
require 'admin-panel.php';
?>


<section class="right">
<?php require "errors.php" ?>


<form method="post">

<?php foreach($users as $user){
 //emp = employee, cant use user due to conflicts   
    ?>

<label> Email </label>
<input type="text" name="email" placeholder="<?=$user->email?>" />

<label> Name </label>

<input type="text" name="name" placeholder="<?=$user->name?>" />

<label> Password </label>

<input type="password" name="password" placeholder="********" />
 

<input type="submit" name="submit" value="submit">









<?php } ?>
<form>
</section>