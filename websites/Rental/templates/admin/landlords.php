<section class="right">

<h2>Categories</h2>

<!-- <?=$add ? "<a class ='new' href='add-category'> Add new Category </a>" : NULL ?> -->



    <table>
    <thead>
    <tr>
    <th>Name </th>
    <th style="width: 5%">&nbsp;</th>
    <th style="width: 5%">&nbsp;</th>
    </tr>


<?php

foreach($landlords as $landlord) {?>

<tr>
<td> <?=$landlord->name;?> </td>

 <td><a style='float: right' href='edit-category?id=$landlord->id'>Edit</a></td>"

<td> 
<form method="post">


<input type='hidden' name='id' value='$landlord->id' />
<input type='submit' name='submit' value='delete' /> 
 NULL 


</form>
</td>
</tr>

<?php 
} ?>

</thead>
</table>
</section>