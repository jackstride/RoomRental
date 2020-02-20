<form method="post">

<label for="name">Select House</label>
<select name="room[house_id]">
<?php
foreach($houses as $house) {?>
<option value="<?=$house->house_id?>"><?=$house->address?></option>
<?php 
} ?>
</select>
<label for="name">Select Tenant</label>
<select name="room[tenant_id]">
<?php
foreach($tenants as $tenant) {?>
<option value="<?=$tenant->landlord_id?>"><?=$tenant->first_name . " " . $tenant->last_name?></option>
<?php 
} ?>
</select>

<label for="name">Type of Room</label>
<select name="room[room_type]">
<option value="single">Single</option>
<option value="double">Double</option>
</select>

<label for="monthly_rental_figure">Montly Rental Amount</label>
<input type="text" name="room[monthly_rental_figure]"/>

<label for="deposit_figure">Deposit Amount</label>
<input type="text" name="room[deposit_figure]"/>

<label for="description">Description</label>
<input type="text" name="room[description]"/>

<label for="furnished">Furnished</label>
<select name="room[furnished]">
<option value="0"> No </option>
<option value="1"> Yes </option>
</select>

<label for="ensuite">Ensuite</label>
<select name="room[ensuite]">
<option value="0"> No </option>
<option value="1"> Yes </option>
</select>

<label for="occupied">Occupied</label>
<select name="room[occupied]">
<option value="0"> No </option>
<option value="1"> Yes </option>
</select>


<input type="submit" name="submit" value="Add Room"/>
</form>
