<?php
require 'admin-panel.php';

?>


<section class="right">

<h2>Categories</h2>

<?=$add ? "<a class ='new' href='add-category'> Add new Category </a>" : NULL ?>



    <table>
    <thead>
    <tr>
    <th>Name </th>
    <th style="width: 5%">&nbsp;</th>
    <th style="width: 5%">&nbsp;</th>
    </tr>


<?php

foreach($categories as $category) {?>

<tr>
<td> <?=$category->name;?> </td>

<?= $edit ? "<td><a style='float: right' href='edit-category?id=$category->id'>Edit</a></td>" : NULL ?>

<td> 
<form method="post">

<?=$delete ? 
"<input type='hidden' name='id' value='$category->id' />
<input type='submit' name='submit' value='delete' /> "
: NULL ?>


</form>
</td>
</tr>

<?php 
} ?>

</thead>
</table>
</section>