<?php
require 'admin-panel.php';
?>


<section class="right">

<?php require "errors.php";?>


<h2>Edit Category</h2>

			<form action="" method="POST">
				<label>Name</label>
				<input type="text" name="name" placeholder="Edit Category" />
				<input type="submit" name="submit" value="Save Category" />
			</form>

</section>