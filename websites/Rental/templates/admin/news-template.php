<?php
require 'admin-panel.php';

?>

<section class="right">

<h2>News</h2>

<?=$add ? '<a class ="new" href="add-news"> Add a News Entry </a>' : NULL ?>

    <table>
    <thead>
    <tr>
    <th>Name </th>
    <th style="width: 5%">&nbsp;</th>
    <th style="width: 5%">&nbsp;</th>
    </tr>


<?php

foreach($newsStory as $news) { ?>

<tr>
<td> <?=$news->title;?> </td>

<?=$edit ? '<td><a style="float: right" href="edit-news?id=' . $news->id . '">Edit</a></td>' : NULL ?>
<td> 
<?=$delete ? ' <form method="post"> <input type="hidden" name="id" value="' . $news->id . '" /> <input type="submit" name="delete" value="delete" />' : NULL ?>
</form>
</td>
</tr>

<?php 
} ?>

</thead>
</table>



</section>