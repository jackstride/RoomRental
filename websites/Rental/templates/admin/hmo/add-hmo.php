<form method="post">
<label for="address"> Address </label>
<input type="text" name="house[address]"/>

<label for="address"> Number of Floors </label>
<input type="text" name="house[number_of_floors]"/>

<label for="number_of_rooms">Number of Rooms</label>
<input type="text" name="house[number_of_rooms]"/>

<label for="wifi_available">Wifi Available</label>

<select name="house[wifi_available]">
<option value="0">No</option>
<option value="1">Yes</option>
</select>

<label for="landlord_id">Select a landlord</label>

<select name="house[landlord_id]">
<?php
foreach($landlords as $landlord) {?>
<option value="<?=$landlord->landlord_id?>"><?=$landlord->first_name . " " . $landlord->last_name?></option>
<?php 
} ?>

</select>

<input type="submit" name="submit" value="Add House"/>
</form>
