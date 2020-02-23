<div class="edit_form">
    <div class="form_labels">
        <label> Adress </label>
        <label> Number Of Floors </label>
        <label> Number Of Rooms </label>
        <label> Wifi </label>
        <label> Landlord </label>
        <label> Save </label>
    </div>
    <form class="form_edit" method="post">
    <?php foreach($houses as $house) {?>
        <input type="text" name="house[address]" placeholder="<?=$house->address?>"></input>
        <input type="number" name="house[number_of_floors]" placeholder="<?=$house->number_of_floors?>"></input>
        <input type="number" name="house[number_of_rooms]" placeholder="<?=$house->number_of_rooms?>"></input>
        <select name="house[wifi_available]">

         <?php
         if($house->wifi_available) { ?>
        <option value="0"> No </option>
        <option selected="true" value="1"> Yes </option>
         <?php } else {
        ?>
        <option selected="true" value="0"> No </option>
        <option value="1"> Yes </option>?>
         <?php } ?>
        </select>

        <select name='house[landlord_id]'>
        <?php foreach($landlords as $landlord) { $selected = $house->landlord_id;?>
            <option <?= $landlord->landlord_id == $selected ? "selected ='true'" : "" ?> value="<?=$landlord->landlord_id?>">
            <?=$landlord->first_name?>
            </option>
            <?php } ?>
        </select>






        <?php } ?>
        <input type="hidden" name="id" value="<?=$id?>"></input>
        <input type="submit" name="Submit" value="Save"></input>
    </form>
</div>