<div class="edit_form">
    <div class="form_labels">
        <label> First Name </label>
        <label> Last Name </label>
        <label> Address </label>
        <label> Phone Number </label>
        <label> Email Address </label>
        <label> Save </label>
    </div>
    <form class="form_edit" method="post">
    <?php foreach($landlords as $landlord) {?>
        <input type="text" name="landlord[first_name]" placeholder="<?=$landlord->first_name?>"></input>
        <input type="text" name="landlord[last_name]" placeholder="<?=$landlord->last_name?>"></input>
        <input type="text" name="landlord[address]" placeholder="<?=$landlord->address?>"></input>
        <input type="text" name="landlord[phone_number]" placeholder="<?=$landlord->phone_number?>"></input>
        <input type="text" name="landlord[email_address]" placeholder="<?=$landlord->email_address?>"></input>
        <?php } ?>
        <input type="hidden" name="id" value="<?=$id?>"></input>
        <input type="submit" name="Submit" value="Save"></input>
    </form>
</div>