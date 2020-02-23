<div class="edit_form">

    <div class="form_labels">
        <label>Title</label>
        <label> First Name </label>
        <label> Surname </label>
        <label> Mobile Number </label>
        <label> Email </label>
        <label> Furnished </label>
        <label> Ensuite </label>
        <label> Occupied </label>
        <label> Save </label>
    </div>

    <form class="form_edit" method="post">

    <?php foreach($tenants as $tenant) {?>

        <input type="text" name="tenant[title]" placeholder="<?=$tenant->title?>"></input>
        <input type="text" name="tenant[first_name]" placeholder="<?=$tenant->first_name?>"></input>
        <input type="text" name="tenant[last_name]" placeholder="<?=$tenant->last_name?>"></input>
        <input type="text" name="tenant[mobile_phone_number]" placeholder="<?=$tenant->mobile_phone_number?>"></input>
        <input type="text" name="tenant[email_address]" placeholder="<?=$tenant->email_address?>"></input>
        <input type="text" name="tenant[employer_details]" placeholder="<?=$tenant->employer_details?>"></input>
    
        <select name="tenant[is_renting]">
        <option <?=$tenant->is_renting == 0 ? "selected='true'" : ""?> value="0"> No </option>
        <option <?=$tenant->is_renting == 1 ? "selected='true'" : ""?> value="1"> Yes </option>
        </select>
    
        <?php } ?>
        <input type="hidden" name="id" value="<?=$id?>"></input>
        <input type="submit" name="Submit" value="Save"></input>
    </form>
</div>