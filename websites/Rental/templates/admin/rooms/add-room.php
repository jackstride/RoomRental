<form method="post">

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

<label for="room_condition">Description</label>
<input type="text" name="room[room_condition]"/>

<input type="submit" name="submit" value="Add landlord"/>
</form>
