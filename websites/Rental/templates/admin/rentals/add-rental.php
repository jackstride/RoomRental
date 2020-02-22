<form method="post">

<label for="address"> Address </label>
<input type="text" name="rental[address]"/>


<select name="rental[landlord_id]">
<?php
foreach($landlords as $landlord) {?>
<option value="<?=$landlord->landlord_id?>"><?=$landlord->first_name . " " . $landlord->last_name?></option>
<?php 
} ?>

</select>

<input type="submit" name="submit" value="Add House"/>
</form>
