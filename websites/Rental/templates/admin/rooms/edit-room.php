<div class="edit_form">

    <div class="form_labels">
        <label> House Address </label>
        <label> Room Type </label>
        <label> Monthly Amount </label>
        <label> Deposit Cost </label>
        <label> Description </label>
        <label> Furnished </label>
        <label> Ensuite </label>
        <label> Occupied </label>
        <label> Save </label>
    </div>

    <form class="form_edit" method="post">

    <?php foreach($rooms as $room) { $selected=$room->house_id?>

        <select name='room[house_id]'>
        <?php foreach($houses as $house) { ?>
            <option <?=$house->house_id == $selected ? "selected ='true'" : "" ?> value="<?=$house->house_id?>">
            <?=$house->address?>
            </option>
            <?php } ?>
        </select>

        <select name="room[room_type]">
        <option <?=$room->room_type == "Single" ? "selected='true'" : ""?> value="Single"> Single </option>
        <option <?=$room->room_type == "Double" ? "selected='true'" : ""?> value="Double"> Double </option>
        </select>

        <input type="text" name="room[monthly_rental_figure]" placeholder="<?=$room->monthly_rental_figure?>"></input>
        <input type="text" name="room[deposit_figure]" placeholder="<?=$room->deposit_figure?>"></input>
        <input type="text" name="room[description]" placeholder="<?=$room->description?>"></input>

        <select name="room[is_furnished]">
        <option <?=$room->is_furnished == 0 ? "selected='true'" : ""?> value="0"> No </option>
        <option <?=$room->is_furnished == 1 ? "selected='true'" : ""?> value="1"> Yes </option>
        </select>

        <select name="room[is_ensuite]">
        <option <?=$room->is_ensuite == 0 ? "selected='true'" : ""?> value="0"> No </option>
        <option <?=$room->is_ensuite == 1 ? "selected='true'" : ""?> value="1"> Yes </option>
        </select>

        <select name="room[is_occupied]">
        <option <?=$room->is_occupied == 0 ? "selected='true'" : ""?> value="0"> No </option>
        <option <?=$room->is_occupied == 1 ? "selected='true'" : ""?> value="1"> Yes </option>
        </select>
    
        <?php } ?>
        <input type="hidden" name="id" value="<?=$id?>"></input>
        <input type="submit" name="Submit" value="Save"></input>
    </form>
</div>