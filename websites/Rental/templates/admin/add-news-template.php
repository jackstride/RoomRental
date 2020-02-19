<?php
 require "admin-panel.php";
 ?>


 <section class="right">

 <?php require "errors.php"?>

<h2> Add News </h2>


    <form method="post" enctype="multipart/form-data">
    <label for="title">Title</label>
    <input type="text" name="news[title]"/>
    <label for="description">description</label>
    <input type="text" name="news[description]"/>
    

    <label>Image</label>

    <input type="file" name="files[]" multiple />

    <input type="submit" name="submit" value="Add news"/>

    </form>



 </section>