<?php
require "admin-panel.php";
?>



<section class="right">
<?php require "errors.php";?>

<h2> Add Category </h2>

<form method="post">
<label for="name"> Name </label>
<input type="text" name="cat[name]"/>
<input type="submit" name="test" value="Add Category"/>
</form>

</section>