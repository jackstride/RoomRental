<form method="post">

<label for="title">Type of Room</label>
<select name="tenant[title]">
<option value="Mr">Mr</option>
<option value="Mrs">Mrs</option>
<option value="Miss">Miss</option>
<option value="Ma">Ms</option>
<option value="Dr">Dr</option>
</select>

<label for="first_name">First Name</label>
<input type="text" name="tenant[first_name]"/>

<label for="last_name">Last Name</label>
<input type="text" name="tenant[last_name]"/>

<label for="mobile_phone_number">Contact Number</label>
<input type="text" name="tenant[mobile_phone_number]"/>

<label for="email_address">Email Address</label>
<input type="text" name="tenant[email_address]"/>

<label for="employer_details">Employer Details</label>
<input type="text" name="tenant[employer_details]"/>

<input type="submit" name="submit" value="Add Tenant"/>
</form>
