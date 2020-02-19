<?php
require 'admin-panel.php';
 ?>



<section class="right">

<?php require "errors.php"?>

<?php
    foreach($furnitures as $furniture){  ?>

<form method="post" enctype="multipart/form-data">

    <label> Name: </label>
    <input type="text" name="product[name]" placeholder="<?=$furniture->name?>" />

    <label> Description: </label>
    <input type="text" name="product[description]" placeholder="<?=$furniture->description?>" />

    <label> Price: </label>
    <input type="number" name="product[price]" placeholder="<?=$furniture->price?>" />

    <label> Catgory: </label>
    <select name="product[categoryId]">
    <?php
    foreach($categories as $category){ ?>
    <option value="<?=$category->id?>"> <?= $category->name?> </option>
    <?php } ?>
    </select>

    <label> Visibility: </label>
    <select name="product[hide]">
    <option value="hide"> hide </option>
    <option value="show"> show </option>
    </select>

    <label> Condition: </label>
    <select name="product[quality]">
    <option value="new">New</option>
    <option value="used">Second Hand</option>
    </select>
    <label> Existing Images:</label>
    <?php

        for($i = 0; $i < 4; $i++) {
            if(array_key_exists($i, $furniture->getImages())){
                if (file_exists("images/furniture/{$furniture->getImages()[$i]->source}")) {  ?>

            <label for="submit"><?=$furniture->getImages()[$i]->source?></label>

            <input type="hidden" name="id" value="<?=$furniture->getImages()[$i]->id?>" /> 
            <input type="submit" name="delete" value="remove <?=$furniture->getImages()[$i]->source?>" />
        <?php }
            }
        }
        ?>
    <label> Upload Images </label>
    <input type="file" name="files[]" multiple />


    <input type='submit' name="submit" value="submit" />
</form>










<?php } ?>





</section>