<?php
require "admin-panel.php";
?>
<section class="right">

<?php require "errors.php"?>

<form method="post" enctype="multipart/form-data">

<?php foreach($newsStory as $news) { ?>

<label> Title </label>
<input type="text" name="news[title]" placeholder="<?=$news->title?>" />

<label> Description </label>
<textarea type="text" name="news[description]" placeholder="<?=$news->description?>"></textarea>

        <?php

        for($i = 0; $i < 4; $i++) {
            if(array_key_exists($i, $news->getImages())){
                if (file_exists("images/furniture/{$news->getImages()[$i]->source}")) {  ?>

            <label> Images </label>
            <li><?=$news->getImages()[$i]->source?></li>

            <input type="hidden" name="id" value="<?=$news->getImages()[$i]->id?>" /> 
            <input type="submit" name="delete" value="remove" />



        <?php }
            }
        }
        ?>
            <label> Upload Images </label>
            <input type="file" name="files[]" multiple />


    <input type="submit" name="submit" />





<?php } ?>

</form>


</section>