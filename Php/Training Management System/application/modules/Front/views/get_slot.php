<select class="form-control" name="slot">
            <option>Select Slot</option>
            <?php
            	foreach ($days as $k) {
            ?>
			<option value="<?=$k->id?>"><?=$k->slot?></option>
            <?php } ?>
          </select>