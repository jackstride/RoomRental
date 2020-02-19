<?php

require "admin-panel.php";
?>


<section class="right">
<h2>Add Furniture</h2>

<?php require "errors.php";?>

    <form method="post" enctype="multipart/form-data">
    <label>Name</label>
    <input type="text" name="product[name]" />

    <label>Description</label>
    <textarea name="product[description]"></textarea>

    <label>Price</label>
    <input type="text" name="product[price]" />

    <label>Category</label>

    <select name="product[categoryId]">
    <?php foreach($categories as $category) {?>
    <option value="<?=$category->id?>"><?=$category->name?></option>
    <?php } ?>
    </select>

    <label> Condition </label>
    <select name="product[quality]">
    <option value="new">New</option>
    <option value="used">Used</option>
    </select>


    <label>Image</label>

    <input type="file" name="files[]" multiple />

    <input type="submit" name="submit" value="Add" />

</form>

</section>