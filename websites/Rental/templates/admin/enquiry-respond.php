<?php
require "admin-panel.php";
?>

<section class="right">
<?php require "errors.php" ?>

<?php foreach($enquiries as $enquiry) {?>

<div class="enquiry">

<table>
<tr>
    <th> Name </th>
    <th> Contact Number </th>
    <th> Email Address </th>
    <th> Message </th>
</tr>
<tr>
    <td><?=$enquiry->name?></td>
    <td><?=$enquiry->contact_number?></td>
    <td><?=$enquiry->email?></td>
    <td><?=$enquiry->message?></td>
</tr>
</table>

<form method="post">

<label> Response Message </label>
<textarea name="reply[response_message]" placeholder="<?=$enquiry->response_message?>"></textarea>

<label> Completed </label>
<select name="reply[completed]">
<option selected disabled hidden>Please select an option</option>
<option value="yes">Yes</option>
<option value="no">No</option>
</select>

<input type="submit" name="submit" value="submit" />

</form>


</div>


<?php } ?>




</section>