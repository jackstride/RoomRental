<?php
require "admin-panel.php";
?>


<section class="right">

<h2> Furniture </h2>
<?= $add ? '<a class="new" href="add-furniture"> Add New Furniture </a>' : NULL ?>

<table>
<thead>
<tr>
<th> Name </th>
<th style="width: 10%">Price</th>
<th style="width: 5%">&nbsp;</th>
<th style="width: 5%">&nbsp;</th>
<th style="width: 5%">&nbsp;</th>
</tr>

<?php foreach($furnitures as $furniture) {

if($furniture->hide == 'show') {
        $value = 'hide';
    }
else{
    $value = 'show';
}
    ?>

<tr>
<td><?=$furniture->name?></td>
<td><span>£</span><?=$furniture->price?></td>

<?= $edit ? '<td><a style="float: right" href="edit-furniture?id=' . $furniture->id . '"> Edit </a></td>' : NULL ?>

<td> <form method="post">

<?= $delete ? '<input type="hidden" name="id" value="' . $furniture->id . '" />
<input type="submit" name="submit" value="delete" /> ' : NULL ?>

<?=$hide ? ' <input type="submit" name="toggle" value="' . $value . '"  /> ' : NULL ?>

</form></td>
</tr>
<?php } ?>

</thead>
</table>


</section>